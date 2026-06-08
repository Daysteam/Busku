<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Rute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $totalBus = Bus::count();

        $totalTiket = Pemesanan::where('status', 'dibayar')->count();

        $totalUser = User::count();

        $totalRute = Rute::count();

        $totalPenumpang = DetailPemesanan::select('nama', 'umur')
            ->distinct()
            ->count();

        $totalPendapatan = Pemesanan::sum('total_harga');

        $totalTiketHariIni = Pemesanan::whereDate('created_at', Carbon::today())
            ->count();

        $totalTiketDibayarHariIni = Pemesanan::where('status', 'dibayar')
            ->whereDate('created_at', Carbon::today())
            ->count();

        $totalPendapatanHariIni = Pemesanan::whereDate('created_at', Carbon::today())
            ->sum('total_harga');

        $detailPemesanans = DetailPemesanan::with('pemesanan.rute')->latest()->take(5)->get();

        $buses = Bus::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBus',
            'totalTiket',
            'totalUser',
            'totalRute',
            'totalPenumpang',
            'totalPendapatan',
            'totalTiketHariIni',
            'totalTiketDibayarHariIni',
            'totalPendapatanHariIni',
            'detailPemesanans',
            'buses'
        ));
    }
}
