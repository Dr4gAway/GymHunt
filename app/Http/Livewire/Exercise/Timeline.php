<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Exercise;

class Timeline extends Component
{
    use AuthorizesRequests;

    public $perPage = 5;

    protected $listeners = [
        'exercise::created' => '$refresh',
        'exercise::deleted' => '$refresh'
    ];
    
    public function render()
    {
        return view('livewire.exercise.timeline');
    }

    public function getExercisesProperty(): LengthAwarePaginator {
        $exercises = Exercise::query()
                    ->latest()
                    ->paginate($this->perPage);
                
        return $exercises;
    }
}
