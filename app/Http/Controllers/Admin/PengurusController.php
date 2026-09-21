<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengurus::query();

        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('jabatan', 'like', '%' . $search . '%')
                    ->orWhere('periode', 'like', '%' . $search . '%');

            });
        }

        // Urutkan berdasarkan urutan
        $pengurus = $query
            ->orderBy('urutan', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pengurus.index', compact('pengurus'));
    }


    public function create()
    {
        return view('admin.pengurus.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'nullable|string|max:100',
            'urutan' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);


        // Upload foto
        if ($request->hasFile('foto')) {

            $validated['foto'] = $request
                ->file('foto')
                ->store('pengurus', 'public');
        }


        Pengurus::create($validated);


        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil ditambahkan.');
    }


    public function show(Pengurus $pengurus)
    {
        return view('admin.pengurus.show', compact('pengurus'));
    }


    public function edit(Pengurus $pengurus)
    {
        return view('admin.pengurus.edit', compact('pengurus'));
    }


    public function update(Request $request, Pengurus $pengurus)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'nullable|string|max:100',
            'urutan' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);


        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($pengurus->foto) {

                Storage::disk('public')->delete($pengurus->foto);
            }


            // Simpan foto baru
            $validated['foto'] = $request
                ->file('foto')
                ->store('pengurus', 'public');
        }


        $pengurus->update($validated);


        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }


    public function destroy(Pengurus $pengurus)
    {
        // Hapus foto
        if ($pengurus->foto) {

            Storage::disk('public')->delete($pengurus->foto);
        }


        $pengurus->delete();


        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}