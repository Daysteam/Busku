<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRuteRequest;
use App\Http\Requests\UpdateRuteRequest;
use App\Models\Bus;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{

    public function index(Request $request){
        try {
            $rutes = Rute::with('bus')
            ->when($request->name, function ($query) use ($request) {
                $query->whereHas('bus', function ($q) use ($request) {
                    $q->where('nama_bus', 'LIKE', '%' . $request->name . '%');
                });
            })
            ->when($request->date, function ($query) use ($request) {
                $query->whereDate('tanggal_berangkat', $request->date);
            })
            ->latest()
            ->paginate(5);

            return view('admin.rute.index', compact('rutes'));
        } catch (\Exception $e) {
            return back()
            ->with('error','Gagal mencari rute');
        }
    }   

    public function create(){

        $buses = Bus::all();
        return view('admin.rute.create',compact('buses'));
    }

    public function store(StoreRuteRequest $request){
        try {
            $validated = $request->validated();

            Rute::create($validated);

            return redirect()->route('rute.index')->with('success','Berhasil menambahkan rute');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal menambahkan rute');
        }
    }

    public function edit(Rute $rute){
        $buses = Bus::all();

        return view('admin.rute.edit',compact(['buses','rute']));
    }

    public function update(Rute $rute, UpdateRuteRequest $request ){
        try {
            $validated = $request->validated();

            $rute->update($validated);

            return redirect()->route('rute.index')->with('success','Berhasil mengupdate rute');
        } catch (\Exception $e) {
            return back()
            ->withInput()
            ->with('error','Gagal mengupdate rute');
        }
    }

    public function destroy(Rute $rute){
        try {
            $rute->delete();

            return redirect()->route('rute.index')->with('success','Berhasil menghapus rute');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal menghapus rute');
        }
    }
}
