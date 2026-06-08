<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    public function index(Request $request){
        
        try {
            $user = auth()->user();

            $penumpangs = DetailPemesanan::with('pemesanan.rute.bus')
                ->whereHas('pemesanan.rute.bus', function ($query) use ($user) {
                    $query->where('user_id', $user);
                })
                ->when($request->search, function ($query) use ($request) {
                    $query->where('nama_penumpang', 'LIKE', '%' . $request->search . '%');
                })
                ->latest()
                ->paginate(5);

            return view('petugas.penumpang.index',compact('penumpangs'));
        }catch(\Exception $e) {
            return back()->with('error','Gagal menampilkan penumpang');
        }

    }
}
