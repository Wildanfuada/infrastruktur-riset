<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfrastrukturRisetController;
use App\Http\Controllers\SDMController;

// Route untuk root path
Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::get('/infrastruktur/map', [InfrastrukturRisetController::class, 'indexmap'])->name('infrastruktur.map');
Route::get('/sdm/map', [SDMController::class, 'indexMap'])->name('sdm.map');
Route::resource('infrastruktur', InfrastrukturRisetController::class);
Route::resource('sdm', SDMController::class);
