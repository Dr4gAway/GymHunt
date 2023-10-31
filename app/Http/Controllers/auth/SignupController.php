<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CommonSignupRequest;
use App\Http\Requests\Auth\GymSignupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Gym;
use App\Models\Common;

class SignupController extends Controller
{
    public function create() {
        return view('auth.signup');
    }

    public function commonStore(CommonSignupRequest $request) {

        /* dd($request->validated()); */

        if($request->validated())
        {
            $avatar = $request->avatar->store('photos/avatars', 'public');
            $banner = $request->banner->store('photos/banners', 'public');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'about' => $request->about,
                'password' => $request->password,
                'phone' => $request->phone,
                'avatar' => 'storage/'.$avatar,
                'banner' => 'storage/'.$banner
            ]);

            $common = Common::create([
                'cpf' => $request->cpf,
                'birth' => $request->birth,
                'user_id' => $user->id
            ]);

            Auth::login($user);
    
            return redirect('/feed');
        } else {
            return back()->withErrors()->withInput();
        }
    }

    public function gymStore(GymSignupRequest $request) {
        
        if ($request->validated())
        {
            $avatar = $request->avatar->store('photos/avatars', 'public');
            $banner = $request->banner->store('photos/banners', 'public');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'about' => $request->about,
                'avatar' => 'storage/'.$avatar,
                'banner' => 'storage/'.$banner
            ]);
    
            $gym = Gym::create([
                'cnpj' => $request->cnpj,
                'open_schedule' => $request->open_schedule,
                'close_schedule' => $request->close_schedule,
                'city' => $request->city,
                'state' => $request->state,
                'district' => $request->district,
                'street' => $request->street,
                'number' => $request->number,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'user_id' => $user->id
            ]);
    
            Auth::login($user);

            return redirect('/feed');
        } else {
            return back()->withErrors()->withInput();
        }
    }
}
