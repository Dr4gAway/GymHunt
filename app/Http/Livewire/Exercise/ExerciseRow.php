<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Exercise;

class ExerciseRow extends Component
{
    public $perPage = 5;
    protected $listeners = [
        'exercise::created' => '$refresh',
        'exercise::deleted' => '$refresh'
    ];
    
    public function render()
    {
        return view('livewire.exercise.exercise-row');
    }

    public function getExercisesProperty() {
        $exercises = Exercise::query()
                    ->latest()
                    ->paginate($this->perPage);
                
        return $exercises;
    }

   
}
