<?php

namespace App\Http\Livewire\Profile\Gym;

use Livewire\Component;

use App\Models\User;
use App\Models\Gym;
use App\Models\Post;
use App\Models\Follower;

class View extends Component
{
    public User $user;
    public Gym $gym;

    public int $perPage = 5;

    public ?Follower $following = null;

    protected $listeners = [
        'user::updated' => '$refresh',
        'post::created' => '$refresh'
    ];

    public function render()
    {
        $this->user = User::find(session('id'));
        $this->gym = Gym::find(session('gym_id'));
        
        return view('livewire.profile.gym.view')
            ->layout('layout.site');
    }

    public function mount($id)
    {
        $this->gym = Gym::where('user_id', $id)->firstOrFail();
        $this->user = User::find($id);
        session(['gym_id' => $this->gym->id]);
        session(['id' => $id]);
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

    public function getPostsProperty() {
        $posts = Post::where('created_by', $this->user->id)->latest()->paginate($this->perPage);

        return $posts;
    }

    public function loadMore() {
        $this->perPage += 5;
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
