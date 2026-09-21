<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Pendaftaran;
use App\Models\Pesan;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layouts.admin', function ($view) {

            // ========================================
            // DEFAULT
            // ========================================
            $totalAnggota = 0;
            $jumlahAnggota = 0;

            $totalBerita = 0;
            $jumlahBerita = 0;
            $beritaTerbaru = collect();

            $totalKegiatan = 0;
            $jumlahKegiatan = 0;
            $kegiatanTerbaru = collect();

            $totalPengurus = 0;
            $jumlahPengurus = 0;

            $totalPendaftaran = 0;
            $jumlahPendaftaran = 0;
            $pendaftaranMenunggu = 0;
            $pendaftaranTerbaru = collect();

            $jumlahPesan = 0;
            $pesanBelumDibaca = 0;

            // ========================================
            // ANGGOTA
            // ========================================
            try {
                $totalAnggota = Anggota::count();
                $jumlahAnggota = $totalAnggota;
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // BERITA
            // ========================================
            try {
                $totalBerita = Berita::count();
                $jumlahBerita = $totalBerita;

                $beritaTerbaru = Berita::latest()
                    ->take(5)
                    ->get();
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // KEGIATAN
            // ========================================
            try {
                $totalKegiatan = Kegiatan::count();
                $jumlahKegiatan = $totalKegiatan;

                $kegiatanTerbaru = Kegiatan::latest()
                    ->take(5)
                    ->get();
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // PENGURUS
            // ========================================
            try {
                $totalPengurus = Pengurus::count();
                $jumlahPengurus = $totalPengurus;
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // PENDAFTARAN
            // ========================================
            try {
                $totalPendaftaran = Pendaftaran::count();
                $jumlahPendaftaran = $totalPendaftaran;

                $pendaftaranMenunggu = Pendaftaran::where(
                    'status',
                    'menunggu'
                )->count();

                $pendaftaranTerbaru = Pendaftaran::latest()
                    ->take(5)
                    ->get();
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // PESAN
            // ========================================
            try {
                $jumlahPesan = Pesan::count();

                $pesanBelumDibaca = Pesan::where(
                    'status',
                    'belum dibaca'
                )->count();
            } catch (\Throwable $e) {
                //
            }

            // ========================================
            // KIRIM KE LAYOUT ADMIN
            // ========================================
            $view->with([
                'totalAnggota' => $totalAnggota,
                'jumlahAnggota' => $jumlahAnggota,

                'totalBerita' => $totalBerita,
                'jumlahBerita' => $jumlahBerita,
                'beritaTerbaru' => $beritaTerbaru,

                'totalKegiatan' => $totalKegiatan,
                'jumlahKegiatan' => $jumlahKegiatan,
                'kegiatanTerbaru' => $kegiatanTerbaru,

                'totalPengurus' => $totalPengurus,
                'jumlahPengurus' => $jumlahPengurus,

                'totalPendaftaran' => $totalPendaftaran,
                'jumlahPendaftaran' => $jumlahPendaftaran,
                'pendaftaranMenunggu' => $pendaftaranMenunggu,
                'pendaftaranTerbaru' => $pendaftaranTerbaru,

                'jumlahPesan' => $jumlahPesan,
                'pesanBelumDibaca' => $pesanBelumDibaca,
            ]);
        });
    }
}