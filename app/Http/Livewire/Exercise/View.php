<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use App\Models\Exercise as Item;

class View extends Component
{
    public Item $exercise;

    public function render()
    {
        return view('livewire.exercise.view');
    }

}