<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_kegiatan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');

            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $kegiatan = $query
            ->latest('tanggal')
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.kegiatan.index',
            compact('kegiatan')
        );
    }


    public function create()
    {
        return view('admin.kegiatan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request
                ->file('gambar')
                ->store('kegiatan', 'public');
        }

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil ditambahkan.'
            );
    }


    public function show(Kegiatan $kegiatan)
    {
        $kegiatan->load('galeri');

        return view(
            'admin.kegiatan.show',
            compact('kegiatan')
        );
    }


    public function edit(Kegiatan $kegiatan)
    {
        return view(
            'admin.kegiatan.edit',
            compact('kegiatan')
        );
    }


    public function update(
        Request $request,
        Kegiatan $kegiatan
    ) {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        $gambar = $kegiatan->gambar;

        if ($request->hasFile('gambar')) {

            if (
                $gambar &&
                Storage::disk('public')->exists($gambar)
            ) {
                Storage::disk('public')->delete($gambar);
            }

            $gambar = $request
                ->file('gambar')
                ->store('kegiatan', 'public');
        }

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil diperbarui.'
            );
    }


    public function destroy(Kegiatan $kegiatan)
    {
        if (
            $kegiatan->gambar &&
            Storage::disk('public')->exists(
                $kegiatan->gambar
            )
        ) {
            Storage::disk('public')->delete(
                $kegiatan->gambar
            );
        }

        $kegiatan->delete();

        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil dihapus.'
            );
    }
}