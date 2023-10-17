<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use App\Models\Exercise;

class ExerciseRow extends Component
{
    protected $listeners = [
        'exercise::created' => '$refresh',
        'exercise::deleted' => '$refresh'
    ];
    
    public function render()
    {
        return view('livewire.exercise.exercise-row');
    }

    public function getExercisesProperty(): LengthAwarePaginator{
        $exercises = Exercise::query()
                    ->latest()
                    ->paginate($this->perPage);
                
        return $exercises;
    }

   
}
