<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Rute;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalBus = Bus::count();
        $totalTiket = Pemesanan::where('status','dibayar')->count();
        $totaluser = User::count();
        $totalRute = Rute::count();
        $totalPenumpang = DetailPemesanan::select('nama','umur')->distinct()->count();
        $totalPendapatan = Pemesanan::sum('total_harga');
        
        return view('admin.dashboard');
    }
}
