<?php

namespace App\Http\Livewire\Profile\Gym;

use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Gym;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public function render(User $user, Gym $gym)
    {
        $this->$user = $user;
        $this->$gym = $gym;
        $this->setFields();

        return view('livewire.profile.gym.update');
    }

    use WithFileUploads;

    public User $user;
    public Gym $gym;

    /* User Data */
    public $name;
    public $email;
    public $phone;
    public $about;
    public $avatar;
    public $banner;
    /* Gym Data */
    public $cpnj;
    public $open_schedule;
    public $close_schedule;
    /* Adress Data */
    public $city;
    public $state;
    public $district;
    public $street;
    public $number;

    public $longitude;
    public $latitude;

    protected $rules = [
        /* User Data */
        'name' => 'required|string',
        'phone' => 'required|string|size:13',
        'about' => 'string|max:2000',
        /* Gym data */
        'open_schedule' => 'required|date_format:H:i',
        'close_schedule' => 'required|date_format:H:i',
        'city' => 'required|string|max:64',
        'state' => 'required|string|max:64',
        'district' => 'required|string|max:64',
        'street' => 'required|string|max:64',
        'number' => 'required|string|max:7',
        'longitude' => 'required|decimal:8,15',
        'latitude' => 'required|decimal:8,15'
    ];

    public function setFields() {
        if(!isset($this->name)) {
            $this->name = $this->user->name;
            $this->email =$this->user->email;
            $this->phone = $this->user->phone;
            $this->about = $this->user->about;
            $this->avatar = $this->user->avatar;
            $this->banner = $this->user->banner;
            /* Gym Data */
            $this->cpnj = $this->gym->cnpj;
            $this->open_schedule = date('H:i', strtotime($this->gym->open_schedule));
            $this->close_schedule = date('H:i', strtotime($this->gym->close_schedule));
            /* Adress Data */
            $this->city = $this->gym->city;
            $this->state = $this->gym->state;
            $this->district = $this->gym->district;
            $this->street = $this->gym->street;
            $this->number = $this->gym->number;
        
            $this->longitude = $this->gym->longitude;
            $this->latitude = $this->gym->latitude;
        }
    }

    public function updatedAvatar()
    {
        try
        {
            $this->validate(['avatar' => 'mimes:jpeg,jpg,png,gif|max:2048']);

        } catch(ValidationException $error) {
            $this->avatar = $this->user->avatar;
            throw $error;
        }
    }

    public function updatedBanner()
    {
        try
        {
            $this->validate(['banner' => 'mimes:jpeg,jpg,png,gif|max:2048']);

        } catch(ValidationException $error) {
            $this->banner = $this->user->banner;
            throw $error;
        }
    }

    public function store() {
        $this->authorize('update', Gym::where('user_id', $this->user->id)->firstOrFail());

        $mapChanged = false;

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

        $gym = Gym::where('user_id', $this->user->id)->first();

        $gym->cnpj = $this->cpnj;
        $gym->open_schedule = $this->open_schedule;
        $gym->close_schedule = $this->close_schedule;
        
        /* Adress Data */
        $gym->city = $this->city;
        $gym->state = $this->state;
        $gym->district = $this->district;
        $gym->street = $this->street;
        $gym->number = $this->number;

        if($this->latitude != $gym->latitude || $this->longitude != $gym->longitude)
            $mapChanged = true;
    
        $gym->longitude = $this->longitude;
        $gym->latitude = $this->latitude;

        if(!is_string($this->avatar))
        {
            $this->validate([
                'avatar' => 'mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $this->cleanupUserImages($this->user->avatar);
            $this->user->avatar = 'storage/'.$this->avatar->store('photos/avatar', 'public');
        }

        if(!is_string($this->banner))
        {
            $this->validate([
                'banner' => 'mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $this->cleanupUserImages($this->user->banner);
            $this->user->banner = 'storage/'.$this->banner->store('photos/banners', 'public');
        }

        $this->user->save();
        $gym->save();

        $this->emitUp('user::updated');
        $this->dispatchBrowserEvent('update::close');
        if($mapChanged)
            $this->dispatchBrowserEvent('map::updated', [$this->longitude, $this->latitude]);
        
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
