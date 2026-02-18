<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfrastrukturRisetController;
use App\Http\Controllers\SDMController;

// Route untuk root path
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('infrastruktur', InfrastrukturRisetController::class);
Route::resource('sdm', SDMController::class);
