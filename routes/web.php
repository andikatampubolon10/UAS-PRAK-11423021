<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriLapanganController;
use App\Http\Controllers\ProdukOlahragaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookingLapanganController;
use App\Http\Controllers\ApproveBookingController;
use App\Http\Controllers\DaftarBookingController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PesanProdukController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware' => ['auth', 'player']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });
    
    Route::get('about', function(){
        return view('index');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    Route::get('/daftarkategorilapanganplayer', [BookingLapanganController::class, 'index']);
    Route::get('/formbooking/form/{id}', [BookingLapanganController::class, 'form'])->name('formbooking.form');
    Route::post('/formbooking', [BookingLapanganController::class, 'store'])->name('formbooking.store');

    Route::get('/formpesan/form/{id}', [PesanProdukController::class, 'form'])->name('formpesan.form');
    Route::post('/formpesan', [PesanProdukController::class, 'store'])->name('formpesan.store');
    Route::get('/approvebooking', [BookingLapanganController::class, 'view']);
    Route::put('approvebooking/{id}', [BookingLapanganController::class, 'update'])->name('approvebooking.update');

    Route::get('/daftarbooking', [DaftarBookingController::class, 'index']);
    
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    //  Route::get('/daftarprodukolahraga', [ProdukOlahragaController::class, 'index']);
    // Route::get('/tambahprodukolahraga', [ProdukOlahragaController::class, 'tambah']);
    // Route::post('tambahkprodukolahraga', [ProdukOlahragaController::class, 'store'])->name('tambahprodukolahraga.store');
    // Route::get('daftarprodukolahraga/delete/{id}', [ProdukOlahragaController::class, 'delete']);
    // Route::get('daftarmember/delete/{id}', [MemberController::class, 'delete']);
    // Route::get('/editprodukolahraga/edit/{id}', [ProdukOlahragaController::class, 'edit']);
    // Route::put('editprodukolahraga/{id}', [ProdukOlahragaController::class, 'update'])->name('editprodukolahraga.update');
    
    

    
    // Route::get('/lihatpesanan', [PesanProdukController::class, 'view']);

    //Lokasi
    Route::get('/daftarlokasi', [LokasiController::class, 'index']);
    Route::get('/tambahlokasi', [LokasiController::class, 'tambah']);
    Route::post('tambahlokasi', [LokasiController::class, 'store'])->name('tambahlokasi.store');
    Route::get('/editlokasi/edit/{id}', [LokasiController::class, 'edit']);
    Route::put('editlokasi/{id}', [LokasiController::class, 'update'])->name('editlokasi.update');
    Route::get('daftarlokasi/delete/{id}', [LokasiController::class, 'delete']);

    //CRUD Pengelola Lapangan
    Route::get('/daftarpengelolalapangan', [PengelolaController::class, 'index']);
    Route::get('/tambahpengelola', [PengelolaController::class, 'tambah']);
    Route::post('tambahpengelola', [PengelolaController::class, 'store'])->name('tambahpengelola.store');
    Route::get('/editpengelola/edit/{id}', [PengelolaController::class, 'edit']);
    Route::put('editpengelola/{id}', [PengelolaController::class, 'update'])->name('editpengelola.update');
    Route::get('daftarpengelolalapangan/delete/{id}', [PengelolaController::class, 'delete']);

    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report/export/excel', [ReportController::class, 'export_excel']);
});

Route::group(['middleware' => ['auth', 'Pengelola']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('/daftarkategorilapangan', [KategoriLapanganController::class, 'index']);
    Route::get('/tambahkategorilapangan', [KategoriLapanganController::class, 'tambah']);
    Route::post('tambahkategorilapangan', [KategoriLapanganController::class, 'store'])->name('tambahkategorilapangan.store');
    Route::get('daftarkategorilapangan/delete/{id}', [KategoriLapanganController::class, 'delete']);
    Route::get('/editkategorilapangan/edit/{id}', [KategoriLapanganController::class, 'edit']);
    Route::put('editkategorilapangan/{id}', [KategoriLapanganController::class, 'update'])->name('editkategorilapangan.update');
    
    Route::get('/daftarmember', [MemberController::class, 'index']);
    Route::get('/tambahmember', [MemberController::class, 'tambah']);
    Route::post('tambahmember', [MemberController::class, 'store'])->name('tambahmember.store');
    Route::get('daftarmember/delete/{id}', [MemberController::class, 'delete']);
    Route::get('/editmember/edit/{id}', [MemberController::class, 'edit']);
    Route::put('editmember/{id}', [MemberController::class, 'update'])->name('editmember.update');

    Route::get('/approvebooking', [BookingLapanganController::class, 'view']);
    Route::put('approvebooking/{id}', [BookingLapanganController::class, 'update'])->name('approvebooking.update');
});

Auth::routes();


