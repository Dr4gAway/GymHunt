<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Post as Item;

class Post extends Component
{
    public Item $post;

    protected $listeners = [
        'comment::created' => '$refresh'
    ];

    public function render(Item $post)
    {
        $this->$post = $post;
        
        return view('livewire.post');
    }
}
