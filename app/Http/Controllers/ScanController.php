<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateScanRequest;
use App\Models\Pemesanan;

class ScanController extends Controller
{
    public function index(){

        $user = auth()->user();

        $totalTiketSudah = Pemesanan::where('status', 'selesai')
            ->whereHas('rute', function ($query) {
                $query->whereDate('tanggal_berangkat', \Carbon\Carbon::today());
            })
            ->whereHas('rute.bus', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->count();

        $totalTiketBelum = Pemesanan::where('status', 'dibayar')
            ->whereHas('rute', function ($query) {
                    $query->whereDate('tanggal_berangkat', \Carbon\Carbon::today());
                })
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
                return response()->json([
                    'success' => false,
                    'message' => 'QR code tidak ditemukan'
                ], 404);
            }

            $user = auth()->user();

            if(!$pemesanan->rute?->bus) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada data bus'
                ], 400);
            }

            if($pemesanan->rute->bus->user_id != $user->id){
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket ini bukan untuk bus anda'
                ], 403);
            }

            if($pemesanan->status === 'selesai'){
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket sudah digunakan'
                ], 400);
            }

            if($pemesanan->status === 'pending'){
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket belum boleh digunakan'
                ], 400);
            }

            $pemesanan->update([
                'status' => 'selesai'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil scan tiket'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal scan tiket'
            ], 500);
        }
    }
}
