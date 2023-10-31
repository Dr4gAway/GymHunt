<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follower;

class Common extends Component
{
    public User $user;

    public ?Follower $following = null;

    public function mount($id) {
        $this->user = User::find($id);
    }

    public function render()
    {
        $this->getFollowingStatus();

        return view('livewire.profile.common')
                    ->layout('layout.site');
    }

    public function getFollowingStatus() {
        if (Auth::check())
        {
            $this->following = Follower::where('user_id', $this->user->id)
                                                         ->where('follower', Auth::user()->id)
                                                         ->first();
        } else {
            return null;
        }
    }

    public function handleFollow() {
        if(!Auth::check()) return redirect()->route('login');

        if($this->following) 
        {
            dd('Following dentro do if', $this->following);

            $this->following->delete();
        } else {
            //$follower = new Follower();
            //dd($follower);
            /* $follower->follower = Auth::user()->id;
            $follower->user_id = $this->user->id;
            $follower->save(); */
        
            $follower = Follower::create([
                'user_id' => $this->user->id,
                'follower' => Auth::user()->id
            ]);

            dd($follower);
        }

        $this->getFollowingStatus();
        dd($this->following);
    }
}
