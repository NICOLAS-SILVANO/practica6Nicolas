<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});

Route::get('/productos', function () {
    return view('products.index');
});
Route::get('/productos/agregar', function () {
    return view('products.form');
});