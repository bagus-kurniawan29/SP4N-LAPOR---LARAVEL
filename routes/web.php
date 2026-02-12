<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/laporan', function () {
    return view('laporan');
})->name('form_laporan');
Route::get('/laporan_saya', function () {
    return view('laporan_saya');
})->name('laporan_saya');
Route::get('/laporan/detail/{id}', function ($id) {
    return view('laporan_detail', ['id' => $id]);
})->name('laporan.detail');