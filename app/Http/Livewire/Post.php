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
        'comment::created' => '$refresh',
        'post::updated' => '$refresh'
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

    public function getVerticalProperty()
    {
        if($this->postType == 1)
        {
            if (isset($this->post->images()->first()->path))
            {
                $image = $this->post->images()->first()->path;
                $size = getimagesize($image);
    
                if($size[1] > $size[0])
                {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public function getPostTypeProperty()
    {
        $postType = 0;

        if($this->post->images->count() > 3)
        {
            return $postType = 4;
        }
        if($this->post->images->count() > 2)
        {
            return $postType = 3;
        }
        if($this->post->images->count() > 1)
        {
            return $postType = 2;
        }
        if($this->post->images->count() == 1)
        {
            return $postType = 1;
        } else {
            //Only one image
            return $postType = 0;
        }
    }

    public function handleDelete()
    {
        $this->post->delete();

        dd('success', 'Post deletado com sucesso.');
    }

}
