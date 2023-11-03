<?php

namespace App\Http\Livewire\Gym;

use Livewire\Component;

class View extends Component
{
    public String $name;
    public String $avatar;
    public String $about;

    public $gym;
    
    public function render()
    {
        return view('livewire.gym.view')
                ->layout('layout.site');
    }
}
