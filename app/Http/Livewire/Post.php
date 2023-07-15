<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Post as Item;

class Post extends Component
{
    public Item $post;

    public function mount(Item $post) {
        $this->$post = $post;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
