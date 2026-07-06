<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Redirect ke halaman login jika akses root
Route::get('/', function () {
    return redirect()->route('login');
});

// Grup route yang butuh login (Auth)
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Buku
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::get('buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])->name('buku.kategori');
    Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])->name('buku.bulk-delete');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/buku/export', [BukuController::class, 'export'])->name('buku.export');
    Route::resource('buku', BukuController::class);

    // Anggota
    Route::get('/anggota/export', [AnggotaController::class, 'export'])->name('anggota.export');
    Route::get('/anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
            Route::resource('anggota', AnggotaController::class)
    ->parameters([
        'anggota' => 'anggota',
    ]);

    // Transaksi 
    Route::get('/transaksi/laporan', [TransaksiController::class, 'laporan'])->name('transaksi.laporan');
    Route::get('/transaksi/laporan/pdf', [TransaksiController::class, 'laporanPdf'])->name('transaksi.laporan.pdf');
    
    Route::resource('transaksi', TransaksiController::class);
    Route::put('/transaksi/{id}/kembalikan', [TransaksiController::class, 'kembalikan'])->name('transaksi.kembalikan');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
});


// Auth Breeze (Login, Register, dll)
require __DIR__.'/auth.php';