<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesan::query();

        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('subjek', 'like', '%' . $search . '%');

            });
        }

        // Filter pesan
        if ($request->filled('status')) {

            if ($request->status === 'belum') {

                $query->where('sudah_dibaca', false);

            } elseif ($request->status === 'sudah') {

                $query->where('sudah_dibaca', true);

            }
        }

        $pesan = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pesan.index', compact('pesan'));
    }


    public function create()
    {
        return view('admin.pesan.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:30',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
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
            ->route('admin.pesan.index')
            ->with('success', 'Pesan berhasil ditambahkan.');
    }


    public function show(Pesan $pesan)
    {
        // Otomatis tandai sudah dibaca
        if (!$pesan->sudah_dibaca) {

            $pesan->update([
                'sudah_dibaca' => true,
            ]);
        }

        return view('admin.pesan.show', compact('pesan'));
    }


    public function edit(Pesan $pesan)
    {
        return view('admin.pesan.edit', compact('pesan'));
    }


    public function update(Request $request, Pesan $pesan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:30',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        $pesan->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'] ?? null,
            'subjek' => $validated['subjek'],
            'pesan' => $validated['pesan'],
        ]);

        return redirect()
            ->route('admin.pesan.index')
            ->with('success', 'Pesan berhasil diperbarui.');
    }


    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()
            ->route('admin.pesan.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}