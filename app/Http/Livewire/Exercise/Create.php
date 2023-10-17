<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;

class Create extends Component
{
    public ?string $nameExerc = null; 
    public ?int $serie = null;
    public ?int $rep = null;
    public ?int $carga = null;
    public $data = null;

    public function render()
    {
        return view('livewire.exercise.create');
    }

    public function store(){
       Exercise::create([
        'nameExerc'=> $this->nameExerc,
        'serie'=> $this->serie,
        'rep'=> $this->rep,
        'carga'=> $this->carga,
        'data'=> $this->data
       ]);
    }
}
