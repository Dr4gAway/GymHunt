<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\GymSignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gym;

class SignupController extends Controller
{
    public function create() {
        return view('auth.signup');
    }

    public function store(SignupRequest $request) {

        if($request->validated())
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                //'bio' => $request->biografia,
                'password' => $request->password,
                'phone' => $request->phone,
                //'cpf' => $request->cpf,
                //'dataNasc' => $request->dataNasc,
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
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone
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

    public function commonStore() {
        return ('cadastro como usuário');
    }
}
