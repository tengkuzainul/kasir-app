<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.signin');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:kepalaToko|admin|kasir'])->group(function () {
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori');
        Route::post('/kategori/save', 'store')->name('kategori.save');
        Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
        Route::post('/kategori/update/{id}', 'update')->name('kategori.update');
        Route::get('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
    });

    Route::controller(BarangController::class)->group(function () {
        Route::get('/barang', 'index')->name('barang');
        Route::post('/barang/save', 'store')->name('barang.save');
        Route::get('/barang/edit/{id}', 'edit')->name('barang.edit');
        Route::post('/barang/update/{id}', 'update')->name('barang.update');
        Route::get('/barang/delete/{id}', 'destroy')->name('barang.delete');
    });

    // Manajemen User Route
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::controller(BarangMasukController::class)->group(function () {
        Route::get('/barangMasuk', 'index')->name('barangMasuk');
        Route::post('/barangMasuk/add', 'store')->name('barangMasuk.save');
    });
});

require __DIR__ . '/auth.php';
