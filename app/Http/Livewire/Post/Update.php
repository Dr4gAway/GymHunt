<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Image;

class Update extends Component
{
    use WithFileUploads;

    public ?string $body = null;

    public $images = [];

    protected $listeners = [
        'image::removed' => '$refresh',
        'post::updated' => 'updatePost'
    ];

    protected $rules = [
        'body' => 'string|min:6',
        'images.*' => 'max:2048'
    ];

    public function render()
    {
        return view('livewire.post.update');
    }

    public function store() {
        $this->validate();

        if($this->images)
        {
            $post = Post::create([
                'body' => $this->body,
                'created_by' => Auth::id()
            ]);

            foreach($this->images as $image)
            {
                $filePath = $photo->store('photos', 'public');
    
                Image::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post->id,
                    'name' => Str::random(16),
                    'path' => "storage/".$filePath,
                    'extension' => strtolower($image->extension()) 
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

    public function updatePost($body, $images) {
        $this->body = $body;
        $this->images = $images;
    }

    public function removeImage($index)
    {   
        if(isset($this->images[$index]))
        {
            unset($this->images[$index]);
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
