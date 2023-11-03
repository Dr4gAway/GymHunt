<?php

namespace App\Http\Livewire\Gym;

use Livewire\Component;

use App\Models\Gym;
use App\Models\User;

class Map extends Component
{
    public function render()
    {
        return view('livewire.gym.map');
    }

    function getGymsProperty() {
        $gyms = User::join('gyms', 'users.id', '=', 'gyms.user_id')->get();        
        return $gyms;
    }
}
