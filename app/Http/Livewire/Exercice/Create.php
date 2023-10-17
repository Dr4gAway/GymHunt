<?php

namespace App\Http\Livewire\Exercice;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercice;

class Create extends Component
{
    public ?string $nameExerc = null; 
    public ?int $serie = null;
    public ?int $rep = null;
    public ?int $carga = null;

    public function render()
    {
        return view('livewire.exercice.create');
    }

    public function store(){
       Exercice::create([
        'nameExerc'=> this->nameExerc,
        'serie'=>this->serie,
        'rep'=>this->rep,
        'carga'=>this->carga,
        'data'=>this->data
       ]);
    }
}
