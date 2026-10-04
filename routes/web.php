<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
| Semua halaman di bawah ini dapat diakses oleh pengunjung
| tanpa harus login.
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', function () {
    return view('public.beranda.index');
})->name('home');


// Berita & Artikel
Route::get('/berita', function () {
    return view('public.berita.index');
})->name('berita.index');

Route::get('/berita/{slug}', function ($slug) {
    return view('public.berita.show', [
        'slug' => $slug
    ]);
})->name('berita.show');


// Materi
Route::get('/materi', function () {
    return view('public.materi.index');
})->name('materi.index');

Route::get('/materi/{slug}', function ($slug) {
    return view('public.materi.show', [
        'slug' => $slug
    ]);
})->name('materi.show');


// Kegiatan
Route::get('/kegiatan', function () {
    return view('public.kegiatan.index');
})->name('kegiatan.index');

Route::get('/kegiatan/{slug}', function ($slug) {
    return view('public.kegiatan.show', [
        'slug' => $slug
    ]);
})->name('kegiatan.show');

Route::get('/kegiatan/{slug}/daftar', function ($slug) {
    return view('public.kegiatan.daftar', [
        'slug' => $slug
    ]);
})->name('kegiatan.daftar');


// Galeri
Route::get('/galeri', function () {
    return view('public.galeri.index');
})->name('galeri.index');

Route::get('/galeri/{slug}', function ($slug) {
    return view('public.galeri.show', [
        'slug' => $slug
    ]);
})->name('galeri.show');


// Chatbot
Route::get('/chatbot', function () {
    return view('public.chatbot.index');
})->name('chatbot.index');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('dashboard');

require __DIR__.'/auth.php';