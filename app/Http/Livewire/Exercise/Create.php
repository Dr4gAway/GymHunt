<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;

class Create extends Component
{
    public ?string $name = null; 
    public ?string $muscle = null; 
    public ?int $series = null;
    public ?int $repetitions = null;
    public ?int $weight = null;
    public $made_date = null;

    public function render()
    {
        //if($muscle)

        return view('livewire.exercise.create');
    }

    public function store() {

       $exercise = Exercise::create([
        'name'=> $this->name,
        'series'=> $this->series,
        'repetitions'=> $this->repetitions,
        'weight'=> $this->weight,
        'made_date'=> $this->made_date
       ]);

       $this->emitUp('exercise::created');
    }
}
