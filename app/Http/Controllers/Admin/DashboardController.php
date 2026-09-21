<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Pendaftaran;
use App\Models\Pesan;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // ANGGOTA
        // =========================
        $totalAnggota = Anggota::count();
        $jumlahAnggota = $totalAnggota;

        // =========================
        // BERITA
        // =========================
        $totalBerita = Berita::count();
        $jumlahBerita = $totalBerita;

        $beritaTerbaru = Berita::latest()
            ->take(5)
            ->get();

        // =========================
        // KEGIATAN
        // =========================
        $totalKegiatan = Kegiatan::count();
        $jumlahKegiatan = $totalKegiatan;

        $kegiatanTerbaru = Kegiatan::latest()
            ->take(5)
            ->get();

        // =========================
        // PENGURUS
        // =========================
        $totalPengurus = Pengurus::count();
        $jumlahPengurus = $totalPengurus;

        // =========================
        // PENDAFTARAN
        // =========================
        $totalPendaftaran = Pendaftaran::count();
        $jumlahPendaftaran = $totalPendaftaran;

        $pendaftaranMenunggu = Pendaftaran::where(
            'status',
            'menunggu'
        )->count();

        $pendaftaranTerbaru = Pendaftaran::latest()
            ->take(5)
            ->get();

        // =========================
        // PESAN
        // =========================
        $jumlahPesan = 0;
        $pesanBelumDibaca = 0;

        try {
            $jumlahPesan = Pesan::count();

            $pesanBelumDibaca = Pesan::where(
                'status',
                'belum dibaca'
            )->count();
        } catch (\Throwable $e) {
            $jumlahPesan = 0;
            $pesanBelumDibaca = 0;
        }

        // =========================
        // KIRIM DATA KE DASHBOARD
        // =========================
        return view('admin.dashboard', compact(
            'totalAnggota',
            'jumlahAnggota',

            'totalBerita',
            'jumlahBerita',
            'beritaTerbaru',

            'totalKegiatan',
            'jumlahKegiatan',
            'kegiatanTerbaru',

            'totalPengurus',
            'jumlahPengurus',

            'totalPendaftaran',
            'jumlahPendaftaran',
            'pendaftaranMenunggu',
            'pendaftaranTerbaru',

            'jumlahPesan',
            'pesanBelumDibaca'
        ));
    }
}