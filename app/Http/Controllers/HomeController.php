<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Pendaftaran;

class HomeController extends Controller
{
    public function index()
    {
        // Statistik
        $jumlahAnggota = 0;
        $jumlahKegiatan = 0;
        $jumlahBerita = 0;
        $jumlahPendaftar = 0;

        // Data publik
        $kegiatan = collect();
        $berita = collect();
        $galeri = collect();
        $pengurus = collect();

        try {
            $jumlahAnggota = Anggota::count();
        } catch (\Throwable $e) {
        }

        try {
            $jumlahKegiatan = Kegiatan::count();

            $kegiatan = Kegiatan::latest('tanggal')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
        }

        try {
            $jumlahBerita = Berita::where('status', 'Publish')->count();

            $berita = Berita::with('kategori')
                ->where('status', 'Publish')
                ->latest('published_at')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
        }

        try {
            $jumlahPendaftar = Pendaftaran::count();
        } catch (\Throwable $e) {
        }

        try {
            $galeri = Galeri::with('kegiatan')
                ->latest()
                ->take(8)
                ->get();
        } catch (\Throwable $e) {
        }

        try {
            $pengurus = Pengurus::orderBy('urutan')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
        }

        return view('home', compact(
            'jumlahAnggota',
            'jumlahKegiatan',
            'jumlahBerita',
            'jumlahPendaftar',
            'kegiatan',
            'berita',
            'galeri',
            'pengurus'
        ));
    }
}