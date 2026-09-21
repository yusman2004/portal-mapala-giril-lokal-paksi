<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\PesanController;

// Public Controllers
use App\Http\Controllers\PendaftaranController as PublicPendaftaranController;
use App\Http\Controllers\PublicController;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| PENDAFTARAN PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/pendaftaran', [
    PublicPendaftaranController::class,
    'create'
])->name('pendaftaran.create');

Route::post('/pendaftaran', [
    PublicPendaftaranController::class,
    'store'
])->name('pendaftaran.store');

Route::get('/pendaftaran/sukses', [
    PublicPendaftaranController::class,
    'sukses'
])->name('pendaftaran.sukses');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | ANGGOTA
        |--------------------------------------------------------------------------
        */

        Route::resource('anggota', AnggotaController::class)
            ->parameters([
                'anggota' => 'anggota'
            ]);


        /*
        |--------------------------------------------------------------------------
        | KATEGORI BERITA
        |--------------------------------------------------------------------------
        */

        Route::resource('kategori-berita', KategoriBeritaController::class)
            ->parameters([
                'kategori-berita' => 'kategori_berita'
            ]);


        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        */

        Route::resource('berita', BeritaController::class)
            ->parameters([
                'berita' => 'berita'
            ]);


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN
        |--------------------------------------------------------------------------
        */

        Route::resource('kegiatan', KegiatanController::class)
            ->parameters([
                'kegiatan' => 'kegiatan'
            ]);


        /*
        |--------------------------------------------------------------------------
        | GALERI
        |--------------------------------------------------------------------------
        */

        Route::resource('galeri', GaleriController::class)
            ->parameters([
                'galeri' => 'galeri'
            ]);


        /*
        |--------------------------------------------------------------------------
        | PENGURUS
        |--------------------------------------------------------------------------
        */

        Route::resource('pengurus', PengurusController::class)
            ->parameters([
                'pengurus' => 'pengurus'
            ]);


        /*
        |--------------------------------------------------------------------------
        | PENDAFTARAN ADMIN
        |--------------------------------------------------------------------------
        */

        Route::resource('pendaftaran', PendaftaranController::class)
            ->parameters([
                'pendaftaran' => 'pendaftaran'
            ]);


        /*
        |--------------------------------------------------------------------------
        | TERIMA PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        Route::post(
            'pendaftaran/{pendaftaran}/terima',
            [PendaftaranController::class, 'terima']
        )->name('pendaftaran.terima');


        /*
        |--------------------------------------------------------------------------
        | TOLAK PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        Route::post(
            'pendaftaran/{pendaftaran}/tolak',
            [PendaftaranController::class, 'tolak']
        )->name('pendaftaran.tolak');


        /*
        |--------------------------------------------------------------------------
        | PESAN PENGUNJUNG
        |--------------------------------------------------------------------------
        */

        Route::resource('pesan', PesanController::class)
            ->parameters([
                'pesan' => 'pesan'
            ]);

    });


/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/tentang', [
    PublicController::class,
    'tentang'
])->name('public.tentang');


Route::get('/kegiatan', [
    PublicController::class,
    'kegiatan'
])->name('public.kegiatan');


Route::get('/berita', [
    PublicController::class,
    'berita'
])->name('public.berita');


Route::get('/berita/{slug}', [
    PublicController::class,
    'detailBerita'
])->name('public.berita.detail');


Route::get('/galeri', [
    PublicController::class,
    'galeri'
])->name('public.galeri');


Route::get('/kontak', [PublicController::class, 'kontak'])
    ->name('public.kontak');

Route::post('/kontak', [PublicController::class, 'kirimPesan'])
    ->name('public.kontak.store');