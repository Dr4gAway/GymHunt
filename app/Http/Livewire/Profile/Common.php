<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follower;

class Common extends Component
{
    public User $user;

    public ?Follower $following = null;

    public function mount($id) {
        $this->user = User::find($id);
        $this->getFollowingStatus();
    }

    public function render()
    {
        return view('livewire.profile.common')
                    ->layout('layout.site');
    }

    public function getFollowingStatus() {
        if (Auth::check())
        {
            /* $this->following = DB::table('followers')->where('user_id', $this->user->id)
                                ->where('follower', Auth::id())->first(); */

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
