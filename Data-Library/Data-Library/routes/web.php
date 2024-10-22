<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SesiController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [SesiController::class, 'formRegister'])->name('form.register');
    Route::post('/register/auth',  [SesiController::class, 'register'])->name('register');
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function() {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/karyawan', [AdminController::class, 'karyawan']);
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', [DataController::class, 'index'])->name('dashboard.index');

Route::group(['middleware' => ['auth','userAkses:Admin']], function () {
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    // Rute untuk Karyawan
    Route::prefix('karyawan')->group(function() {
        Route::get('/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
        Route::post('/store', [KaryawanController::class, 'store'])->name('karyawan.store');
        Route::delete('/hapus/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
        Route::get('/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::put('/update/{id_karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
        Route::get('/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
    });
});

// Rute untuk Pemasukan
Route::prefix('pemasukan')->group(function() {
    Route::get('/', [PemasukanController::class, 'index'])->name('pemasukan.index');
    Route::get('/tambah', [PemasukanController::class, 'create'])->name('pemasukan.create');
    Route::post('/store', [PemasukanController::class, 'store'])->name('pemasukan.store');
    Route::get('/generate-laporan', [LaporanController::class, 'generate'])->name('laporan.generate');
    Route::get('/pemasukan/download/{id}', [PemasukanController::class, 'download'])->name('pemasukan.download');
    Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');
});

// Rute untuk Pengeluaran
Route::prefix('pengeluaran')->group(function() {
    Route::get('/', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
    Route::get('/tambah', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/generate', [LaporanController::class, 'index'])->name('membuat.laporan');
    Route::get('/pengeluaran/download/{id}', [PengeluaranController::class, 'download'])->name('pengeluaran.download');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
});


