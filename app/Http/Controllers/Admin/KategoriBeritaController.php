<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategori = KategoriBerita::withCount('berita')
            ->latest()
            ->paginate(10);

        return view('admin.kategori-berita.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori-berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_berita,nama_kategori',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.kategori-berita.index')
            ->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function show(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->load('berita');

        return view('admin.kategori-berita.show', compact('kategoriBerita'));
    }

    public function edit(KategoriBerita $kategoriBerita)
    {
        return view('admin.kategori-berita.edit', compact('kategoriBerita'));
    }

    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_berita,nama_kategori,' . $kategoriBerita->id,
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriBerita->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.kategori-berita.index')
            ->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        if ($kategoriBerita->berita()->exists()) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh berita.');
        }

        $kategoriBerita->delete();

        return redirect()
            ->route('admin.kategori-berita.index')
            ->with('success', 'Kategori berita berhasil dihapus.');
    }
}