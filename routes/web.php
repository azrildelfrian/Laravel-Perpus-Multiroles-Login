<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\C_Buku;
use App\Http\Controllers\C_Kategori;
use App\Http\Controllers\C_Anggota;
use App\Http\Controllers\C_Peminjaman;
use App\Http\Controllers\C_Pengembalian;
use App\Http\Controllers\C_Riwayat_peminjaman;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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


Route::middleware(['guest'])->group(function(){
    //Home
    Route::get('/', function () {
        return view('auth.login');
    });

    //Login
    Route::get('/login', [AuthController::class,'index'])->name('auth');
    Route::post('/login', [AuthController::class,'login']);

    //Daftar
    Route::get('/daftar', [AuthController::class,'create'])->name('daftar');
    Route::post('/daftar', [AuthController::class,'daftar']);

    //Untuk melakukan verifikasi
    Route::get('/verify/{verify_key}',[AuthController::class, 'verify']);
});

Route::middleware(['auth'])->group(function (){
    Route::redirect('/home','/user');
    //Session
    Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user',[UserController::class,'index'])->name('user')->middleware('userAkses:user');

    //Logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    //Anggota
    Route::get('/anggota',[\App\Http\Controllers\C_Anggota::class,'index']);
    Route::post('/anggota', [C_Anggota::class, 'store'])->name('anggota.store');
    Route::get('/anggota/tambah', [\App\Http\Controllers\C_Anggota::class, 'tambah'])->name('anggota.tambah');
    Route::get('/anggota/{id}/edit', [\App\Http\Controllers\C_Anggota::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{id}', [\App\Http\Controllers\C_Anggota::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/{id}', [\App\Http\Controllers\C_Anggota::class, 'destroy'])->name('anggota.destroy');

    //Buku
    Route::get('/buku',[\App\Http\Controllers\C_Buku::class,'index']);
    Route::post('/buku', [C_Buku::class, 'store'])->name('buku.store');
    Route::get('/buku/tambah', [\App\Http\Controllers\C_Buku::class, 'tambah'])->name('buku.tambah');
    Route::get('/buku/{id}/edit', [\App\Http\Controllers\C_Buku::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [\App\Http\Controllers\C_Buku::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [\App\Http\Controllers\C_Buku::class, 'destroy'])->name('buku.destroy');

    //Kategori
    Route::get('/kategori',[C_Kategori::class, 'index']);
    Route::post('/kategori', [C_Kategori::class, 'store'])->name('kategori.store');
    Route::get('/kategori/tambah', [C_Kategori::class, 'tambah'])->name('kategori.tambah');
    Route::get('/kategori/{id}/edit', [C_Kategori::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [C_Kategori::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [C_Kategori::class, 'destroy'])->name('kategori.destroy');

    //Peminjaman
    Route::get('/peminjaman',[C_Peminjaman::class, 'index']);
    Route::post('/peminjaman', [C_peminjaman::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/tambah', [C_peminjaman::class, 'tambah'])->name('peminjaman.tambah');
    Route::get('/peminjaman/{id}/edit', [C_peminjaman::class, 'edit'])->name('peminjaman.edit');
    Route::put('/peminjaman/{id}', [C_peminjaman::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{id}', [C_peminjaman::class, 'destroy'])->name('peminjaman.destroy');

    
    //Pengembalian
    Route::get('/pengembalian',[C_pengembalian::class, 'index']);
    Route::post('/pengembalian', [C_pengembalian::class, 'store'])->name('pengembalian.store');
    Route::get('/pengembalian/tambah', [C_pengembalian::class, 'tambah'])->name('pengembalian.tambah');
    Route::get('/pengembalian/{id}/edit', [C_pengembalian::class, 'edit'])->name('pengembalian.edit');
    Route::put('/pengembalian/{id}', [C_pengembalian::class, 'update'])->name('pengembalian.update');
    Route::delete('/pengembalian/{id}', [C_pengembalian::class, 'destroy'])->name('pengembalian.destroy');

    //Riwayat Peminjaman
    Route::get('/riwayat_peminjaman',[C_Riwayat_peminjaman::class, 'index']);

});

//Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
//Route::post('/login-auth', [\App\Http\Controllers\LoginController::class, 'login_auth'])->name('login-auth');




//Route::post('/buku',[\App\Http\Controllers\C_Buku::class,'store']);
//Route::get('/buku/tambah',[\App\Http\Controllers\C_Buku::class,'tambah']);

