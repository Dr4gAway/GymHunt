<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    public function create() {
        return view('auth.signup');
    }

    public function store(SignupRequest $request) {
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
        ]);

        Auth::login($user);

        return redirect('/feed');
    }
}
