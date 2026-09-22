<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('public.beranda.index');
});


Route::get('/berita', function () {
    return view('public.berita.index');
});


Route::get('/berita/{slug}', function ($slug) {
    return view('public.berita.show', [
        'slug' => $slug
        ]);
});


Route::get('/materi', function () {
    return view('public.materi.index');
});


Route::get('/materi/{slug}', function ($slug) {
    return view('public.materi.show', [
        'slug' => $slug
    ]);
    
});