<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function edit(){
        $user = auth()->user();

        return view('account.edit',compact('user'));
    }   

    public function update(UpdateAccountRequest $request){
        
        try {
            $request->validated();

            if(! Hash::check($request->current_password, auth()->user()->password)) {
                return back()->withErrors([
                    'current_password' => 'Password tidak sama'
                ]);
            }

            auth()->user()->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return back()->with('success','Berhasil mengupdate account');
        } catch (\Exception $e){
            return back()->withInput()->with('error','Gagal mengupdate account');
        }
    }
}
