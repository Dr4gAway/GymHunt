<?php

namespace App\Http\Livewire\Gym;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Gym;
use App\Models\User;

class Search extends Component
{
    public ?String $search = '';

    public function render()
    {
        return view('livewire.gym.search');
    }

    function getGymsProperty() {
        if($this->search) {

            /* $gyms = Gym::user()->where('name', 'like', $this->search)->pluck('name'); */

            /* $gyms = User::where('name', 'like', $this->search)
                        ->whereHas('gyms', function (Builder $query) {
                           $query->where('id', 'user_id');
                        }); */

            $gyms = User::select('name', 'open_schedule', 'close_schedule', 'users.id')
                        ->join('gyms', 'users.id', '=', 'gyms.user_id')
                        ->where('users.name', 'like', '%'.$this->search.'%')
                        ->get();

            //$gyms = DB::table('users')->where('name', 'LIKE', $this->search)->select('name')->join('gyms', 'gyms.user_id', '=', 'users.id')->get();
            //dd($gyms);

            return $gyms;
        } else {
            return [];
        }
    }
}
