<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Rute;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $kotaAsals = Rute::distinct()
            ->orderBy('kota_asal')
            ->pluck('kota_asal');

        $kotaTujuans = Rute::distinct()
            ->orderBy('kota_tujuan')
            ->pluck('kota_tujuan');
        
        $buses = Bus::with('ruteUtama')->latest()->take(3)->get();

        return view('landing.landing',compact(['kotaAsals','kotaTujuans','buses']));
    }
}
