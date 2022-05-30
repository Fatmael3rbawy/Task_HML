<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }

    public function handelLogin(LoginRequest $request)
    {
        
        $remember_me = $request->has('remember_me') ? true : false;
        $check = $request->only('email', 'password');

       
       if(Auth::guard('admin')->attempt($check, $remember_me)) {
           return redirect(route('admin.index'));
       }
        return back()->with(['error' => 'Your data is wrong']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
