<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GroupMusc extends Component
{
    public ?string $nameGroup = null;
    public function render()
    {
        return view('livewire.group-musc');
    }
}
