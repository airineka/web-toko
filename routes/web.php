<?php

use App\Controller\Perpustakaan\Perpustakaans;
use App\Http\Controllers\Perpustaaan\PerpustaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('perpustakaan',PerpustaanController::class)->names('perpustakaan');
});
