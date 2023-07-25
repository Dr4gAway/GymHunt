<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Create extends Component
{
    public ?string $body;

    protected $rules = [
        'body' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.post.create');
    }

    public function store() {

        Post::create([
            'body' => $body,
            'created_by' => Auth::id(),
        ]);
        
    }
}
