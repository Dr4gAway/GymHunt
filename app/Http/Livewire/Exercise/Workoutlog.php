<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;

class Workoutlog extends Component
{
    protected $listeners = [
        'exercise::created' => '$refresh',
        'exercise::deleted' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.exercise.workoutlog')
             ->layout('layout.site');
    }

    public function getExerciseGroupProperty()
    {
        $exerciseGroup = Exercise::where('user_id', Auth::id())
                                 ->get()
                                 ->groupBy(['made_date', 'muscle']);
        return $exerciseGroup;
    }
}
