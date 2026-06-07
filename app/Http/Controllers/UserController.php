<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $users = User::when($request->search, function ($query) use ($request) {
                $query->where('username', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);

            return view('admin.user.index', compact('users'));
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal menampilkan data');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $validated = $request->validated();

            User::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make('password'),
                'role' => RoleEnum::PETUGAS->value,
            ]);

            return redirect()->route('user.index')->with('success','Berhasil menambahkan user');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
    
            $user->update($validated);
    
            return redirect()->route('user.index')->with('success','Berhasil mengedit user');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal mengupdate data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
    
            return redirect()->route('user.index')->with('success','Berhasil menghapus user');        
        } catch (\Exception $e) {
            return back()
            ->with('error','Gagal menghapus data');
        }
    }
}
