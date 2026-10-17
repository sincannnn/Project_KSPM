<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaArtikelController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\GaleriController;


use App\Http\Controllers\Public\KegiatanController as PublicKegiatanController;
use App\Http\Controllers\Public\BeritaArtikelController as PublicBeritaArtikelController;
/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
| Halaman publik dapat diakses tanpa login.
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('public.beranda.index');
})->name('home');


/*
|--------------------------------------------------------------------------
| BERITA & ARTIKEL PUBLIK
|--------------------------------------------------------------------------
*/

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [PublicBeritaArtikelController::class, 'index'])
        ->name('index');

    Route::get('/{slug}', [PublicBeritaArtikelController::class, 'show'])
        ->name('show');
});


/*
|--------------------------------------------------------------------------
| MATERI PUBLIK
|--------------------------------------------------------------------------
*/

Route::prefix('materi')->name('materi.')->group(function () {
    Route::get('/', function () {
        return view('public.materi.index');
    })->name('index');

    Route::get('/{slug}', function (string $slug) {
        return view('public.materi.show', compact('slug'));
    })->name('show');
});

/*
|--------------------------------------------------------------------------
| KEGIATAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [PublicKegiatanController::class, 'index'])
        ->name('index');

    Route::get('/{slug}/daftar', function (string $slug) {
        return view('public.kegiatan.daftar', compact('slug'));
    })->name('daftar');

    Route::get('/{slug}', [PublicKegiatanController::class, 'show'])
        ->name('show');
});


/*
|--------------------------------------------------------------------------
| GALERI PUBLIK
|--------------------------------------------------------------------------
*/

Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/', function () {
        return view('public.galeri.index');
    })->name('index');

    Route::get('/{slug}', function (string $slug) {
        return view('public.galeri.show', compact('slug'));
    })->name('show');
});

/*
|--------------------------------------------------------------------------
| CHATBOT PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/chatbot', function () {
    return view('public.chatbot.index');
})->name('chatbot.index');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
| Hanya pengguna yang lolos middleware admin yang dapat mengaksesnya.
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index',
        ])->name('dashboard');

        Route::resource('berita-artikel', BeritaArtikelController::class)
            ->parameters([
                'berita-artikel' => 'beritaArtikel',
            ]);

         Route::resource('materi', MateriController::class);
         Route::resource('kegiatan', KegiatanController::class);
         Route::resource('galeri', GaleriController::class);
    });
/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
| Login, logout, dan autentikasi Admin KSPM.
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';