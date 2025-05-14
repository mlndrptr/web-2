<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return "Belajar Laravel 12 di STT Nurul Fikri 2025";
});