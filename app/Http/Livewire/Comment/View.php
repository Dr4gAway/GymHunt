<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public Comment $comment;

    public ?CommentLike $liked = null;
    public int $likesCount = 0;

    public function render(Comment $comment)
    {
        $this->getLikedStatus();
        $this->getLikesCount();
        $this->$comment = $comment;

        return view('livewire.comment.view');
    }

    public function getLikedStatus() {
        $this->liked = CommentLike::where('comment_id', $this->comment->id)
                                  ->where('user_id', Auth::id())
                                  ->first();
    }

    public function getLikesCount() {
        $this->likesCount = CommentLike::where('comment_id', $this->comment->id)
                                       ->count();
    }

    public function handleLike() {
        if($this->liked)
        {
            $this->liked->delete();
        } else {
            CommentLike::create([
                'user_id' => Auth::id(),
                'comment_id' => $this->comment->id
            ]);
        }

        $this->getLikedStatus();
        $this->getLikesCount();
    }
}
