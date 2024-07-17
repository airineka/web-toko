<?php

use App\Http\Controllers\Perpustakaan\PerpustakaanController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
  Route::view('/dashboard', 'dashboard')->name('dashboard');
  Route::resource('perpustakaan', PerpustakaanController::class)->names('perpustakaan');
});

Route::fallback(function () {
  return view('layouts.error');
});
