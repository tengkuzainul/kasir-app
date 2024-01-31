<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:kepalaToko|kasir'])->group(function () {
    // Manajemen User Route
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.add');
    Route::post('/user/save', [UserController::class, 'store'])->name('user.save');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/laporanPenjualan}', 'dataPenjualan')->name('transaksi.laporan');
    });

    Route::controller(ReturnController::class)->group(function () {
        Route::get('/returnBarang', 'index')->name('returnBarang');
        Route::post('/returnBarang/save', 'store')->name('returnBarang.save');
        Route::get('/returnBarang/delete/{id}', 'destroy')->name('returnBarang.delete');
    });
});


Route::middleware(['auth', 'verified', 'role:kasir'])->group(function () {
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

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('transaksi');
        Route::get('/transaksi/create', 'create')->name('transaksi.create');
        Route::post('/transaksi/save', 'store')->name('transaksi.save');
        Route::get('/transaksi/delete/{id}', 'destroy')->name('transaksi.delete');
        // cetak Invoice
        Route::get('/transaksi/print-invoice/{id}', 'printInvoice')->name('transaksi.printInvoice');
    });
});


Route::middleware(['auth', 'verified', 'role:admin|kasir'])->group(function () {
    Route::controller(BarangMasukController::class)->group(function () {
        Route::get('/barangMasuk', 'index')->name('barangMasuk');
        Route::post('/barangMasuk/add', 'store')->name('barangMasuk.save');
        Route::delete('/barangMasuk/delete/{id}', 'destroy')->name('barangMasuk.delete');
        // cetak Laporan
        Route::get('/laporanBarangMasuk', 'cetakLaporan')->name('barangMasuk.laporan');
    });

    Route::controller(BarangKeluarController::class)->group(function () {
        Route::get('/barangKeluar', 'index')->name('barangKeluar');
        Route::post('/barangKeluar/add', 'store')->name('barangKeluar.save');
        Route::delete('/barangKeluar/delete/{id}', 'destroy')->name('barangKeluar.delete');
        // cetak Laporan
        Route::get('/laporanBarangKeluar', 'cetakLaporan')->name('barangkeluar.laporan');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'index')->name('customer');
        Route::post('/customer/save', 'store')->name('customer.save');
        Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
        Route::post('/customer/update/{id}', 'update')->name('customer.update');
        Route::get('/customer/delete/{id}', 'destroy')->name('customer.delete');
        // cetak Laporan
        Route::get('/laporanCustomer', 'cetakLaporan')->name('cetakLaporan');
    });
});


require __DIR__ . '/auth.php';
