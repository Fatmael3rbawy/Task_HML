<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function login()
    {
        return view('user.auth.login');
    }

    public function handelLogin(LoginRequest $request)
    {
    
        $remember_me = $request->has('remember_me') ? true : false;
        $check = $request->only('email', 'password');

        if (Auth::attempt($check, $remember_me)) {
             return redirect(route('home'));
        }
        return back()->with(['error' => 'Your data is wrong']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
