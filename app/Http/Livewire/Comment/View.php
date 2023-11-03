<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class View extends Component
{
    use AuthorizesRequests;

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
        if(!Auth::check())
            return redirect()->route('login');
        
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

    public function handleDelete()
    {
        $this->authorize('delete', $this->comment);

        $this->comment->delete();

    
        $this->emitUp('comment::deleted');
    }
}
