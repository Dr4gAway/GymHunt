<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Create extends Component
{
    use WithFileUploads;

    public ?string $body = null;

    public $photo;

    protected $rules = [
        'body' => 'required|string|min:6'
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function store() {
        $this->validate();

        if($this->photo)
        {
            Post::create([
                'body' => $this->body,
                'created_by' => Auth::id(),
                'photo' => $this->photo->store('photos')
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
