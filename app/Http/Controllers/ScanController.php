<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateScanRequest;
use App\Models\Pemesanan;

class ScanController extends Controller
{
    public function index(){

        $user = auth()->user();

        $totalTiketSudah = Pemesanan::where('status', 'digunakan')
            ->whereHas('rute.bus', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->count();

        $totalTiketBelum = Pemesanan::where('status', 'dibayar')
            ->whereHas('rute.bus', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->count();
        return view('petugas.scan.index', compact(['totalTiketSudah','totalTiketBelum']));
    }

    public function scan(UpdateScanRequest $request){

        try {
            $request->validated();

            $pemesanan = Pemesanan::with('rute.bus')->where('qr_code', $request->qr_code)->first();

            if(!$pemesanan){
                return back()->with('error','QR code tidak ditemukan');
            }

            $user = auth()->user();

            if(!$pemesanan->rute?->bus) {
                return back()->with('error','Tidak ada data bus');
            }

            if($pemesanan->rute->bus->user_id != $user->id){
                return back()->with('error','Tiket ini bukan untuk bus anda');
            }

            if($pemesanan->status === 'selesai'){
                return back()->with('error','Tiket sudah digunakan');
            }

            if($pemesanan->status === 'pending'){
                return back()->with('error','Tiket tidak valid');
            }

            $pemesanan->update([
                'status' => 'selesai'
            ]);

            return back()->with('success','Berhasil scan tiket');
        } catch (\Exception $e) {
            return back()->with('error','Gagal scan tiket');
        }
    }
}
