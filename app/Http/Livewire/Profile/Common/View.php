<?php

namespace App\Http\Livewire\Profile\Common;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follower;

class View extends Component
{
    public User $user;

    public ?Follower $following = null;

    public $userId;
    protected $queryString = ['userId'];

    protected $listeners = [ 'user::updated' => '$refresh'];

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
