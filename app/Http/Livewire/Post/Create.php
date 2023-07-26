<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Create extends Component
{
    public ?string $body = null;

    protected $rules = [
        'body' => 'required|string|min:6',
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function store() {
        $this->validate();

        Post::create([
            'body' => $this->body,
            'created_by' => Auth::id()
        ]);

        $this->emitUp('post::created');

        $this->reset('body');
        
    }
}
