<?php

namespace App\Http\Livewire\Exercice;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercice;

class Create extends Component
{
    public function render()
    {
        return view('livewire.exercice.create');
    }
}
