<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\InfrastrukturRisetController;
use App\Http\Controllers\SDMController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/sdm/map', [SDMController::class, 'map'])->name('sdm.map');
Route::get('/infrastruktur/map', [InfrastrukturRisetController::class, 'map'])->name('infrastruktur.map');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('infrastruktur', InfrastrukturRisetController::class)->except(['show']);
    Route::resource('sdm', SDMController::class)->except(['show']);
});
