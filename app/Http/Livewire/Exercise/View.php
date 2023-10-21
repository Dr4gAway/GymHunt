<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;

class View extends Component
{
    public Exercise $exercise;

    public function render($exercise)
    {
        return view('livewire.exercise.view');
    }

}
