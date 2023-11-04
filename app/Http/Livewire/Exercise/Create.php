<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;


class Create extends Component
{
    public ?string $name = null; 
    public ?string $muscle = null; 
    public $series = null;
    public $repetitions = null;
    public $weight = null;
    public $made_date = null;

    protected $rules = [
        'name' => 'required|string',
        'series' => 'required|integer|min:1',
        'repetitions' => 'required|integer|min:1',
        'muscle' => 'required|string',
        'weight' => 'required|integer|min:1',
        'made_date' => 'required|date_format:Y-m-d',
    ];

    public function render()
    {
        
        return view('livewire.exercise.create');
    }

    public function store()
    {
        $this->validate();
        
       $exercise = Exercise::create([
        'user_id' => Auth::id(),
        'name'=> $this->name,
        'series'=> $this->series,
        'repetitions'=> $this->repetitions,
        'muscle'=> $this->muscle,
        'weight'=> $this->weight,
        'made_date'=> $this->made_date
       ]);

       $this->dispatchBrowserEvent('exercise::close');
       $this->emitTo('exercise.workoutlog','exercise::created');
    }
}
