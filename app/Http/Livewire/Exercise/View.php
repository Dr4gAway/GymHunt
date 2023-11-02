<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use App\Models\Exercise;

class View extends Component
{
    public Exercise $exercise;

    public function render(Exercise $exercise)
    {
        $this->$exercise = $exercise;

        return view('livewire.exercise.view');
    }

    public function handleDelete()
    {
        $this->exercise->delete();

        $this->emitUp('exercise::deleted');
        $this->dispatchBrowserEvent('exercise::deleted');
        $this->emitTo('exercise.workoutlot', 'exercise::deleted');
    }
}