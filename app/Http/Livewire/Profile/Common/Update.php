<?php

namespace App\Http\Livewire\Profile\Common;

use Livewire\Component;
use App\Models\User;
use App\Models\Common;

class Update extends Component
{
    public User $user;

    public $name;
    public $email;
    public $phone;
    public $about;
    public $cpf;
    public $birth;

    public function render(User $user)
    {
        $this->$user = $user;
        $this->setFields();

        return view('livewire.profile.common.update');
    }

    public function setFields() {
        if(!isset($this->name)) {
            $this->name = $this->user->name;
            $this->email =$this->user->email;
            $this->phone = $this->user->phone;
            $this->about = $this->user->about;
            $common = Common::where('user_id', $this->user->id)->first();
            $this->cpf = $common->cpf;
            $this->birth = $common->birth;
        }
    }

    public function store() {
        $this->user->name = $this->name;
        $this->user->email =$this->email;
        $this->user->phone = $this->phone;
        $this->user->about = $this->about;

        $common = Common::where('user_id', $this->user->id)->first();
        $common->cpf = $this->cpf;
        $common->birth = $this->birth;

        $this->user->save();
        $common->save();

        $this->emitUp('user::updated');
        $this->dispatchBrowserEvent('update::close');
    }
}
