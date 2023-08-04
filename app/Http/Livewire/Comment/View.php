<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

use App\Models\Comment;

class View extends Component
{
    public Comment $comment;

    public function render(Comment $comment)
    {
        $this->$comment = $comment;

        return view('livewire.comment.view');
    }
}
