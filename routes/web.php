<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/kegiatan', function () {
    return view('public.kegiatan.index');
});

Route::get('/kegiatan/{slug}', function ($slug) {
    return view('public.kegiatan.show', [
        'slug' => $slug
    ]);
});

Route::get('/kegiatan/{slug}/daftar', function ($slug) {
    return view('public.kegiatan.daftar', [
        'slug' => $slug
    ]);
});

Route::get('/galeri', function () {
    return view('public.galeri.index');
});

Route::get('/galeri/{slug}', function ($slug) {
    return view('public.galeri.show', [
        'slug' => $slug
    ]);
});