<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Galeri;
use App\Models\Pengurus;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Halaman Tentang Organisasi
     */
    public function tentang()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('public.tentang', compact('pengurus'));
    }


    /**
     * Halaman Kegiatan
     */
    public function kegiatan()
    {
        $kegiatan = Kegiatan::latest()
            ->paginate(9);

        return view('public.kegiatan', compact('kegiatan'));
    }


    /**
     * Halaman Berita
     */
    public function berita()
    {
        $berita = Berita::with('kategori')
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate(9);

        return view('public.berita', compact('berita'));
    }


    /**
     * Detail Berita
     */
    public function detailBerita($slug)
    {
        $berita = Berita::with('kategori')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $beritaLainnya = Berita::with('kategori')
            ->where('id', '!=', $berita->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        return view(
            'public.detail-berita',
            compact('berita', 'beritaLainnya')
        );
    }


    /**
     * Halaman Galeri
     */
    public function galeri()
    {
        $galeri = Galeri::latest()
            ->paginate(12);

        return view('public.galeri', compact('galeri'));
    }


    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('public.kontak');
    }


    /**
     * Proses kirim pesan dari halaman kontak
     */
    public function kirimPesan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:30',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subjek.required' => 'Subjek wajib diisi.',
            'pesan.required' => 'Pesan wajib diisi.',
        ]);

        Pesan::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'] ?? null,
            'subjek' => $validated['subjek'],
            'pesan' => $validated['pesan'],
            'sudah_dibaca' => false,
        ]);

        return redirect()
            ->route('public.kontak')
            ->with(
                'success',
                'Pesan berhasil dikirim dan sudah diterima oleh admin.'
            );
    }
}