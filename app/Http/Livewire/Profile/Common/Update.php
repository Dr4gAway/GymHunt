<?php

namespace App\Http\Livewire\Profile\Common;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Common;

class Update extends Component
{
    use WithFileUploads;

    public User $user;

    public $name;
    public $email;
    public $phone;
    public $about;
    public $cpf;
    public $birth;

    public $avatar;
    public $banner;

    protected $rules = [
        /* User data */
        'name' => 'required|string',
        'phone' => 'required|string|size:13',
        'about' => 'string|max:2000',
        /* Common data  */
        'cpf' => 'required|string|size:11',
        'birth' => 'required|date_format:Y-m-d'
    ];

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
            $this->avatar = $this->user->avatar;
            $this->banner = $this->user->banner;
            $common = Common::where('user_id', $this->user->id)->first();
            $this->cpf = $common->cpf;
            $this->birth = $common->birth;
        }
    }

    public function store() {
        if ($this->email != $this->user->email)
        {
            $this->validate([
                'email' => 'required|email|unique:users',
            ]);
        } else {
            $this->validate();
        }

        $this->user->name = $this->name;
        $this->user->email =$this->email;
        $this->user->phone = $this->phone;
        $this->user->about = $this->about;

        $common = Common::where('user_id', $this->user->id)->first();
        $common->cpf = $this->cpf;
        $common->birth = $this->birth;

        if(!is_string($this->avatar))
        {
            $this->validate([
                'avatar' => 'image|max:2048',
            ]);

            $this->cleanupUserImages($this->user->avatar);
            $this->user->avatar = 'storage/'.$this->avatar->store('photos/avatar', 'public');
        }

        if(!is_string($this->banner))
        {
            $this->validate([
                'banner' => 'image|max:2048',
            ]);

            $this->cleanupUserImages($this->user->banner);
            $this->user->banner = 'storage/'.$this->banner->store('photos/banners', 'public');
        }

        $this->user->save();
        $common->save();

        $this->emitUp('user::updated');
        $this->dispatchBrowserEvent('update::close');
    }

    public function cleanupUserImages($imagePath)
    {
        $storage = Storage::disk('public');

        //dd('$storage');

        if(Str::contains($imagePath, 'storage/'))
        {
            $path = Str::substr($imagePath, 8);
            $storage->delete($path);
        }
    }
}
