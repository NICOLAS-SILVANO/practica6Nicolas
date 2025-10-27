<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('index');
});

Route::get('/productos', function () {
    return view('products.index');
});
//Route::get('/productos/agregar', function () {
    //return view('products.form');
//});



Route::resource('products', ProductController::class)->except('show');
Route::get('/productos', [ProductController::class, 'index'])->name('product.index');