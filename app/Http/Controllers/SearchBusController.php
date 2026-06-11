<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Rute;
use Illuminate\Http\Request;

class SearchBusController extends Controller
{
    public function index(Request $request){

        if(!auth()->check()){

            session([
                'search-bus' => [
                    'kota_asal' => $request->kota_asal,
                    'kota_tujuan' => $request->kota_tujuan,
                    'tanggal_berangkat' => $request->tanggal_berangkat
                ]
            ]);

            return redirect()->route('login');

        };

        $kotaAsals = Rute::distinct()
            ->orderBy('kota_asal')
            ->pluck('kota_asal');

        $kotaTujuans = Rute::distinct()
            ->orderBy('kota_tujuan')
            ->pluck('kota_tujuan');

        $rutes = Rute::with('bus')->whereRaw('1 = 0')->paginate(5);

        if($request->filled('kota_asal') && $request->filled('kota_tujuan') && $request->filled('tanggal_berangkat')){
            $rutes = Rute::with('bus')
                ->where('kota_asal', $request->kota_asal)
                ->where('kota_tujuan', $request->kota_tujuan)
                ->whereDate('tanggal_berangkat', $request->tanggal_berangkat)
                ->paginate(5);

            foreach ($rutes as $rute) {

                $jumlahKursi = $rute->bus->jumlah_kursi;

                $jumlahPemesanan = Pemesanan::where('rute_id',$rute->id)
                    ->sum('jumlah_tiket');

                $rute->sisa_kursi = $jumlahKursi - $jumlahPemesanan;
            }
        }

        return view('customer.search-bus.index', compact(['kotaAsals','kotaTujuans','rutes']));
    }

    public function create(Rute $rute){
        
        $jumlahKursi = $rute->bus->jumlah_kursi;

        $jumlahPemesanan = Pemesanan::where('rute_id', $rute->id)->sum('jumlah_tiket');

        $sisa_kursi = $jumlahKursi - $jumlahPemesanan;
        return view('customer.search-bus.create', compact(['rute','sisa_kursi']));
    }
}
