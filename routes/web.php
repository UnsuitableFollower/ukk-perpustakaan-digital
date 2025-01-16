<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JenisAnggotaController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\DDCController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\FormatController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/anggota/{id}/deactivate', [AnggotaController::class, 'deactivate'])->name('anggota.deactivate');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    Route::resource('jenis-anggota', JenisAnggotaController::class);
    Route::resource('rak', RakController::class);
    Route::resource('ddc', DDCController::class);
    Route::get('/rak', [RakController::class, 'index'])->name('rak.index');
    Route::get('/ddc', [DDCController::class, 'index'])->name('ddc.index');
    Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
    Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
    Route::resource('pengarang', PengarangController::class);
    Route::get('/pustaka', [PustakaController::class, 'index'])->name('pustaka.index');
    Route::post('/pustaka', [PustakaController::class, 'store'])->name('pustaka.store');
    Route::delete('/pustaka/{pustaka}', [PustakaController::class, 'destroy'])->name('pustaka.destroy');
    Route::put('/pustaka/{id}', [PustakaController::class, 'update'])->name('pustaka.update');
    Route::resource('format', FormatController::class); 
});

require __DIR__ . '/auth.php';
