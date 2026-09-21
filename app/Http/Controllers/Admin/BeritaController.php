<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $berita = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = KategoriBerita::orderBy('nama_kategori')->get();

        return view('admin.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Draft,Publish',
            'published_at' => 'nullable|date',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'slug' => $this->generateUniqueSlug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambar,
            'status' => $request->status,
            'published_at' => $request->status === 'Publish'
                ? ($request->published_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        $berita->load('kategori');

        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $kategori = KategoriBerita::orderBy('nama_kategori')->get();

        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Draft,Publish',
            'published_at' => 'nullable|date',
        ]);

        $gambar = $berita->gambar;

        if ($request->hasFile('gambar')) {

            if ($gambar && Storage::disk('public')->exists($gambar)) {
                Storage::disk('public')->delete($gambar);
            }

            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'slug' => $this->generateUniqueSlug(
                $request->judul,
                $berita->id
            ),
            'isi' => $request->isi,
            'gambar' => $gambar,
            'status' => $request->status,
            'published_at' => $request->status === 'Publish'
                ? ($request->published_at ?? $berita->published_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    private function generateUniqueSlug($judul, $ignoreId = null)
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $counter = 1;

        while (
            Berita::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}