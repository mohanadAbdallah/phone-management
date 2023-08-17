<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthinticationController extends Controller
{
    public function register(registerRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required,email',
            'password'=>'required',
        ]);
        if (Auth::attempt($credentials)){
            return redirect('/');
        }
        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }


}
