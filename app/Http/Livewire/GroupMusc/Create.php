<?php

namespace App\Http\Livewire\GroupMusc;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\GroupMusc;

class Create extends Component
{
    public ?string $nameGroup = null; 

    public function render()
    {
        return view('livewire.group-musc.create');
    }
    public function store() {

        $groupMusc = GroupMusc::create([
         'nameGroup'=> $this->nameGroup,
        ]);
 
        $this->emitUp('groupMusc::created');
     }
}
