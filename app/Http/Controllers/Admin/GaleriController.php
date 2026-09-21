<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::with('kegiatan');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('keterangan', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('kegiatan_id')) {
            $query->where(
                'kegiatan_id',
                $request->kegiatan_id
            );
        }

        $galeri = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $kegiatan = Kegiatan::orderBy(
            'tanggal',
            'desc'
        )->get();

        return view(
            'admin.galeri.index',
            compact('galeri', 'kegiatan')
        );
    }

    public function create()
    {
        $kegiatan = Kegiatan::orderBy(
            'tanggal',
            'desc'
        )->get();

        return view(
            'admin.galeri.create',
            compact('kegiatan')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'keterangan' => 'nullable|string',
        ], [
            'judul.required' => 'Judul foto wajib diisi.',
            'foto.required' => 'Foto wajib diupload.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 4 MB.',
        ]);

        $foto = $request
            ->file('foto')
            ->store('galeri', 'public');

        Galeri::create([
            'kegiatan_id' => $request->kegiatan_id,
            'judul' => $request->judul,
            'foto' => $foto,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto galeri berhasil ditambahkan.'
            );
    }

    public function show(Galeri $galeri)
    {
        $galeri->load('kegiatan');

        return view(
            'admin.galeri.show',
            compact('galeri')
        );
    }

    public function edit(Galeri $galeri)
    {
        $kegiatan = Kegiatan::orderBy(
            'tanggal',
            'desc'
        )->get();

        return view(
            'admin.galeri.edit',
            compact('galeri', 'kegiatan')
        );
    }

    public function update(
        Request $request,
        Galeri $galeri
    ) {
        $request->validate([
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'keterangan' => 'nullable|string',
        ], [
            'judul.required' => 'Judul foto wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 4 MB.',
        ]);

        $foto = $galeri->foto;

        if ($request->hasFile('foto')) {

            if (
                $foto &&
                Storage::disk('public')->exists($foto)
            ) {
                Storage::disk('public')->delete($foto);
            }

            $foto = $request
                ->file('foto')
                ->store('galeri', 'public');
        }

        $galeri->update([
            'kegiatan_id' => $request->kegiatan_id,
            'judul' => $request->judul,
            'foto' => $foto,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto galeri berhasil diperbarui.'
            );
    }

    public function destroy(Galeri $galeri)
    {
        if (
            $galeri->foto &&
            Storage::disk('public')->exists($galeri->foto)
        ) {
            Storage::disk('public')->delete(
                $galeri->foto
            );
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto galeri berhasil dihapus.'
            );
    }
}