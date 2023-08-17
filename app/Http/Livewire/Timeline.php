<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;

class Timeline extends Component
{
    public int $perPage = 5;

    protected $listeners = [
        'post::created' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.timeline');
    }

    public function getPostsProperty(): LengthAwarePaginator {
        $posts = Post::query()
                    ->latest()
                    ->paginate($this->perPage);

        return $posts;
    }

    public function loadMore() {
        $this->perPage += 5;
    }
}
