<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Timeline extends Component
{
    public function render()
    {
        return view('livewire.timeline');
    }

    public function getPostsProperty() {
        $posts = Post::query()
                    ->latest()
                    ->paginate(5);

        return $posts;
    }
}
