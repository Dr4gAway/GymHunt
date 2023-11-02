<?php

namespace App\Http\Livewire\Profile\Common;

use Livewire\Component;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;

class View extends Component
{
    public User $user;
    public ?Follower $following = null;

    public $perPage = 5;

    protected $listeners = [
        'user::updated' => '$refresh',
        'post::created' => '$refresh'
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        session(['id' => $id]);
    }

    public function render()
    {
        $this->user = User::find(session('id'));
        $this->getFollowingStatus();

        return view('livewire.profile.common.view')
                    ->layout('layout.site');
    }

    public function getPostsProperty() : LengthAwarePaginator {
        $posts = Post::where('created_by', $this->user->id)
                     ->latest()
                     ->paginate($this->perPage);

        return $posts;
    }

    public function loadMore() {
        $this->perPage += 5;
    }

    public function getFollowingCountProperty() {
        return Follower::where('follower', $this->user->id)
                       ->count();
    }

    public function getFollowersCountProperty() {
        return Follower::where('user_id', $this->user->id)
        ->count();
    }

    public function getFollowingStatus() {
        if (Auth::check())
        {
            $this->following = Follower::where('user_id', $this->user->id)
                                       ->where('follower', Auth::id())
                                       ->first();
            
        }
    }

    public function handleFollow() {
        if(!Auth::check()) return redirect()->route('login');

        if($this->following) 
        {
            $this->following->delete();
        } else {
            $this->following = Follower::create([
                'user_id' => $this->user->id,
                'follower' => Auth::id()
            ]);
        }

        $this->getFollowingStatus();
    }
}
