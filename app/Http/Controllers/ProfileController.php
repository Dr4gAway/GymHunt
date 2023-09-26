<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $perfil = Profile::find($id);

        return view('perfil', compact('perfil'));
    }
}
