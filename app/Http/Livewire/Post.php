<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use \App\Models\Post as Item;
use \App\Models\PostLike;
use \App\Models\Comment;

class Post extends Component
{
    public Item $post;

    public ?PostLike $liked = null;
    public int $likeCount = 0;

    public bool $showAll = false;

    protected $listeners = [
        'comment::created' => '$refresh'
    ];

    public function mount() {
        $this->getLikedStatus();
        $this->getLikesCount();
    }

    public function render(Item $post)
    {
        $this->$post = $post;
        
        return view('livewire.post');
    }
    
    public function getCommentsProperty() {
        $comments = Comment::where('post_id', $this->post->id)->latest()->get();

        return $comments;
    }

    public function getLikedStatus() {
        $this->liked = PostLike::where('post_id', $this->post->id)
                               ->where('user_id', Auth::id())
                               ->first();
    }

    public function getLikesCount() {
        $this->likesCount = PostLike::where('post_id', $this->post->id)
                                    ->count();
    }

    public function handleLike()
    {
        if ($this->liked)
        {
            $this->liked->delete();
        } else {
            PostLike::create([
                'user_id' => Auth::id(),
                'post_id' => $this->post->id
            ]);
        }

        $this->getLikedStatus();
        $this->getLikesCount();
    }
}