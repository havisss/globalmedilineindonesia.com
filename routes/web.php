<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();
    return view('landing', compact('products'));
});

Route::redirect('/about', '/about/profil-perusahaan');

Route::get('/about/profil-perusahaan', function () {
    return view('about.profil-perusahaan');
});

Route::get('/about/landasan-perusahaan', function () {
    return view('about.landasan-perusahaan');
});

Route::get('/about/nilai-tambah', function () {
    return view('about.nilai-tambah');
});

Route::get('/services/portofolio-pelayanan', function () {
    return view('services.portofolio-pelayanan');
});

Route::get('/services/sektor-pelayanan', function () {
    return view('services.sektor-pelayanan');
});

Route::get('/services/layanan-teknis', function () {
    return view('services.layanan-teknis');
});

Route::get('/contact', function () {
    return view('contact.index');
});
