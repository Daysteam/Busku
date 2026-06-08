<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect()->intended(route('dashboard-admin'));
            }

            if ($role === 'petugas') {
                return redirect()->intended(route('scan.index'));
            }

            if ($role === 'customer') {
                return redirect()->intended('/customer');
            }
            
            // kalo ada role yang gak ada
            Auth::logout();

            return redirect('/login')->withErrors(['email' => 'Role tidak dikenali']);
        }

        return back()
        ->withErrors([
            'email' => 'password atau email salah'
        ])->onlyInput('email');
    }

    public function logOut(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegister(){
        return view('auth.register');
    }
}
