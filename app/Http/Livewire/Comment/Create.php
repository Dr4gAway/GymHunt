<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class Create extends Component
{
    public ?string $body = null;
    public ?int $post_id = null;

    public function render()
    {
        return view('livewire.comment.create');
    }

    public function store() {
        if (Gate::denies('create', Comment::class))
            return redirect(route('login'));
        
        Comment::create([
            'body' => $this->body,
            'created_by' => Auth::id(),
            'post_id' => $this->post_id
        ]);

        $this->body = null;

        $this->emitUp('comment::created');
    }
}
