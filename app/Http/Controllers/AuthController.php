<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            if ($role === RoleEnum::ADMIN->value) {
                return redirect()->intended(route('dashboard-admin'));
            }

            if ($role === RoleEnum::PETUGAS->value) {
                return redirect()->intended(route('scan.index'));
            }

            if ($role === RoleEnum::CUSTOMER->value) {

                if(session()->has('search-bus')){

                    $search = session('search-bus');

                    session()->forget('search-bus');

                    return redirect()->route('search-bus.index',
                    [
                        'kota_asal' => $search['kota_asal'],
                        'kota_tujuan' => $search['kota_tujuan'],
                        'tanggal_berangkat' => $search['tanggal_berangkat'],
                    ]);

                };

                return redirect()->intended(route('search-bus.index'));
            }
            
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

    public function register(StoreRegisterRequest $request){
        try {
            $validated = $request->validated();
            
            $user = User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => RoleEnum::CUSTOMER->value
            ]);

            Auth::login($user);

            return redirect()->intended(route('search-bus.index'));

        } catch (\Exception $e) {
            return back()->withInput()->with('error','Gagal mendaftar');
        }
    }
}
