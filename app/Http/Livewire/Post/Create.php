<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Image;

class Create extends Component
{
    use WithFileUploads;

    public ?string $body = null;

    public $photo;
    public $file;
    public $fileOriginalName;
    public $filePath;

    protected $rules = [
        'body' => 'required|string|min:6'
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function store() {
        $this->validate();

        $this->originalFileName = $this->photo->getClientOriginalName();

        if($this->photo)
        {
            $filePath = $this->photo->store('photos', 'public');

            $post = Post::create([
                'body' => $this->body,
                'created_by' => Auth::id(),
                'photo' => $filePath
            ]);

            Image::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
                'name' => Str::random(16),
                'path' => $filePath,
                'extension' => strtolower($this->photo->extension()) 
            ]);
        } else {
            Post::create([
                'body' => $this->body,
                'created_by' => Auth::id()
            ]);
        }


        $this->emitUp('post::created');

        $this->reset('body');
        
    }
}
