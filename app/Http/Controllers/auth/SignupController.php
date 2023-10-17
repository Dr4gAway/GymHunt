<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\GymSignupRequest;
use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    public function create() {
        return view('auth.signup');
    }

    public function store(SignupRequest $request) {
        
        dd($request);

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
        
        $request->validated();
        dd($request);

        return ('cadastro como academia');
    }

    public function commonStore() {
        return ('cadastro como usuário');
    }
}
