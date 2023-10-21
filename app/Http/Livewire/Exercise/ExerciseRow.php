<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Exercise;

class ExerciseRow extends Component
{
    use AuthorizesRequests;
    
    public $exercise;

    public $perPage = 5;

    public $route;

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

    public function handleDelete($redirect)
    {
        //$this->authorize('delete', $this->exercise);

        $this->exercise->delete();

        if($redirect)
            return redirect()->route('workout_log');
        else
            $this->emitTo('workout_log', 'exercise::deleted');
    }
   
}
