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
use App\Http\Controllers\RuteController;
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

Route::get('/test',function () {
	return view('petugas.scan.index');
});
Route::get('/', [LandingController::class, 'index'])->name('landing-page');
Route::get('/login',[AuthController::class,'showLogin'])->name('login-page');
Route::get('/register',[AuthController::class, 'showRegister'])->name('register-page');

Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/s',);
Route::middleware(['auth'])->group(function () {

    Route::middleware(['check_role:admin'])->group(function () {

        Route::get('/admin', AdminDashboardController::class)->name('dashboard-admin');
        Route::post('/pemesanan/confirm/{pemesanan}', [PemesananController::class,'confirm'])->name('pemesanan.confirm');
        Route::post('/pemesanan/cancelled/{pemesanan}', [PemesananController::class,'cancelled'])->name('pemesanan.cancelled');
        Route::resource('/user', UserController::class);
        Route::resource('/pemesanan', PemesananController::class);
        Route::resource('/rute', RuteController::class);
        Route::resource('/bus', BusController::class)->parameters([
                'bus' => 'bus'
            ]);


    });

    Route::get('/account',[AccountController::class,'edit'])->name('account.edit');
    Route::put('/account',[AccountController::class,'update'])->name('account.update');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});








