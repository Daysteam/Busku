<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SearchBusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LandingController::class, 'index'])->name('landing-page');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/register',[AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['check_role:admin'])->group(function () {

        Route::get('/admin', AdminDashboardController::class)->name('dashboard-admin');
        Route::post('/pemesanan/confirm/{pemesanan}', [PemesananController::class,'confirm'])->name('pemesanan.confirm');
        Route::post('/pemesanan/cancelled/{pemesanan}', [PemesananController::class,'cancelled'])->name('pemesanan.cancelle');
        Route::resource('/user', UserController::class);
        Route::resource('/pemesanan', PemesananController::class)->except(['store']);
        Route::resource('/rute', RuteController::class);
        Route::resource('/bus', BusController::class)->parameters([
                'bus' => 'bus'
            ]);


    });

    Route::middleware(['check_role:petugas'])->group(function () {
        Route::get('/scan-qr',[ScanController::class,'index'])->name('scan.index');
        Route::post('/scan-qr',[ScanController::class,'scan'])->name('scan.scan');
        Route::get('/penumpang',[PenumpangController::class,'index'])->name('penumpang.index');
        Route::get('/jadwal', [BusController::class, 'jadwal'])->name('jadwal.index');
    });

    Route::middleware(['check_role:customer'])->group(function () {
        Route::get('/cari-bus',[SearchBusController::class,'index'])->name('search-bus.index');
        Route::get('/cari-bus/{rute}',[SearchBusController::class,'create'])->name('search-bus.create');
        Route::post('/cari-bus/{rute}',[PemesananController::class,'store'])->name('search-bus.store');
        Route::post('/pemesanan/cancelled/{pemesanan}', [PemesananController::class,'cancelled'])->name('pemesanan.cancelled');
        Route::get('/qr-code',[PemesananController::class,'myTicket'])->name('qr-code.index');
        Route::get('/qr-code/{pemesanan}',QrController::class)->name('qr-code.show');
    });

    Route::get('/account',[AccountController::class,'edit'])->name('account.edit');
    Route::put('/account',[AccountController::class,'update'])->name('account.update');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});








