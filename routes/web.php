<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');

    Route::get('/laporan_saya', function () {
        return view('laporan_saya');
    })->name('laporan_saya');

    Route::get('/laporan/detail', function () {
        return view('laporan_detail');
    })->name('laporan.detail');
});