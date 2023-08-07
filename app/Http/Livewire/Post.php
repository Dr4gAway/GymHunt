<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use \App\Models\Post as Item;
use \App\Models\Like;

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

    public function getLikedProperty()
    {
        $liked = Like::where('post_id', $this->id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        dd($liked);

        return $liked;
    }

    public function likeStore()
    {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $this->post->id
        ]);
    }
}
