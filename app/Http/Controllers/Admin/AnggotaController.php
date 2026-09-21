<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('angkatan', 'like', "%{$search}%");
            });
        }

        $anggota = $query->latest()->paginate(10);

        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'angkatan' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => [
                'required',
                Rule::in(['Aktif', 'Tidak Aktif']),
            ],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('anggota', 'public');
        }

        Anggota::create($validated);

        return redirect()
            ->route('admin.anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function show(Anggota $anggota)
    {
        return view('admin.anggota.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'angkatan' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => [
                'required',
                Rule::in(['Aktif', 'Tidak Aktif']),
            ],
        ]);

        if ($request->hasFile('foto')) {

            if ($anggota->foto) {
                Storage::disk('public')->delete($anggota->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('anggota', 'public');
        }

        $anggota->update($validated);

        return redirect()
            ->route('admin.anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()
            ->route('admin.anggota.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}