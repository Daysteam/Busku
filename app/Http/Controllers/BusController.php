<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{

    public function index(Request $request){
        try {
            $buses = Bus::when($request->search, function ($query) use ($request) {
                $query->where('nama_bus', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);

            return view('admin.bus.index', compact('buses'));
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal mencari bus');
        }
    }   

    public function create(){

        $users = User::all();
        return view('admin.bus.create',compact('users'));
    }

    public function store(StoreBusRequest $request){
        try {
            $validated = $request->validated();

            if($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('bus','public');
            }

            Bus::create($validated);

            return redirect()->route('bus.index')->with('success','Berhasil menambahkan bus');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal menambahkan bus');
        }
    }

    public function edit(Bus $bus){
        $users = User::all();

        return view('admin.bus.edit',compact(['bus','users']));
    }

    public function update(Bus $bus, UpdateBusRequest $request ){
        try {
            $validated = $request->validated();
            
            if($request->hasFile('image')) {
                
                if($bus->image){

                    Storage::disk('public')->delete($bus->image);
                    
                }

                $validated['image'] = $request->file('image')->store('bus','public');
            }

            $bus->update($validated);

            return redirect()->route('bus.index')->with('success','Berhasil mengupdate bus');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal mengupdate bus');
        }
    }

    public function destroy(Bus $bus){
        try {
            if ($bus->image) {

                Storage::disk('public')->delete($bus->image);

            }

            $bus->delete();

            return redirect()->route('bus.index')->with('success','Berhasil menghapus bus');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal menghapus bus');
        }
    }
}
