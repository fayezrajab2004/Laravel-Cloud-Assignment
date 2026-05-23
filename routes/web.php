<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// مسار الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
});

// مسار صفحة من نحن
Route::get('/about', function () {
    return view('about');
});
