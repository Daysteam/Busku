<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(Request $request){
        try {
            $pemesanans = Pemesanan::with('user')
                ->whereHas('user', function ($query) use ($request) {
                    $query->where('username', 'LIKE', '%' . $request->nama . '%');
                })
                ->when($request->date, function ($query) use ($request) {
                    $query->whereDate('created_at', $request->date);
            })
            ->latest()
            ->paginate(5);
            return view('admin.pemesanan.index', compact('pemesanans'));
        } catch (\Exception $e) {
            return back()->with('error','Gagal mengambil data tiket');
        }
    }

    public function confirm(Pemesanan $pemesanan){

        try {
             if ($pemesanan->status === 'dibayar'){
                return back()->with('error','Tiket sudah dibayar');
            }

            $pemesanan->status = 'dibayar';
            $pemesanan->save();

            return back()->with('success','Berhasil mengubah status tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal mengubah status tiket');
        }
    }

    public function cancelled(Pemesanan $pemesanan){
        try {
            if($pemesanan->status === 'batal'){
                return back()->with('error','Tiket sudah dibatalkan');
            }
    
            $pemesanan->status = 'batal';
            $pemesanan->save();

            return back()->with('success','Berhasil membatalkan tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal membatalkan tiket');
        }
    }

    public function show(Pemesanan $pemesanan){
        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    public function destroy(Pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();

            return redirect()->route('pemesanan.index')->with('success','Berhasil menghapus tiket');
        } catch(\Exception $e) {
            return back()
            ->with('error','Gagal menghapus tiket');
        }
    }
}
