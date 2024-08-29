<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class loginController extends Controller
{

    public $username, $password;
    public function index(){
        return view('login/login',[
            'title' => 'Patroli Cwf'
        ]);
    }

    public function auth(Request $request)
    {
       
        $credentials = $request->validate([
            'username' => 'required|min:8',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed !');
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
