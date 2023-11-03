<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Post;
use App\Models\Image;

class Create extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public ?string $body = null;

    public $photos = [];

    protected $listeners = [
        'image::removed' => '$refresh'
    ];

    protected $rules = [
        'body' => 'required|string|min:6',
        'photos.*' => 'max:2048'
    ];

    protected $messages = [
        'body.required' => 'Não se pode enviar um post vazio',
        'body.min' => 'São necessários pelo menos 6 caracteres',
        'photos.*' => 'Foto inválida'
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function updatedPhotos($e)
    {
        foreach($e as $index => $item)
        {
            try
            {
                $this->validate(['photos.'.$index => 'mimes:jpeg,jpg,png,gif|max:2048']);
            } catch(ValidationException $error) {
                dd($e);
                unset($this->photos[$index]);
                throw $error;
            }
        }
    }

    public function store() {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        $this->validate();

        if($this->photos)
        {
            $post = Post::create([
                'body' => $this->body,
                'created_by' => Auth::id()
            ]);

            foreach($this->photos as $photo)
            {
                $filePath = $photo->store('photos', 'public');
    
                Image::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post->id,
                    'name' => basename($filePath),
                    'path' => "storage/".$filePath,
                    'extension' => strtolower($photo->extension()) 
                ]);
            }
        } else {
            Post::create([
                'body' => $this->body,
                'created_by' => Auth::id()
            ]);
        }

        $this->emitUp('post::created');
        $this->reset(['body', 'photos']);
        $this->cleanupOldUploads();
    }

    public function removeImage($index)
    {   
        if(isset($this->photos[$index]))
        {
            unset($this->photos[$index]);
        }

        $this->emitSelf('image::removed');
    }

    protected function cleanupOldUploads()
    {
        //if (FileUploadConfiguration::isUsingS3()) return;

        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (! $storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subDay()->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
}
