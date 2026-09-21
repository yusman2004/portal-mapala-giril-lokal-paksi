<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%')
                  ->orWhere('nim', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pendaftaran = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.pendaftaran.index',
            compact('pendaftaran')
        );
    }

    public function create()
    {
        return view('admin.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:30',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'angkatan' => 'required|string|max:20',
            'alasan_bergabung' => 'required|string',
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'alasan_bergabung' => $request->alasan_bergabung,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with(
                'success',
                'Data pendaftaran berhasil ditambahkan.'
            );
    }

    public function show(Pendaftaran $pendaftaran)
    {
        return view(
            'admin.pendaftaran.show',
            compact('pendaftaran')
        );
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        return view(
            'admin.pendaftaran.edit',
            compact('pendaftaran')
        );
    }

    public function update(
        Request $request,
        Pendaftaran $pendaftaran
    ) {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:30',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'angkatan' => 'required|string|max:20',
            'alasan_bergabung' => 'required|string',
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        $pendaftaran->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'alasan_bergabung' => $request->alasan_bergabung,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with(
                'success',
                'Data pendaftaran berhasil diperbarui.'
            );
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with(
                'success',
                'Data pendaftaran berhasil dihapus.'
            );
    }

    public function terima(Pendaftaran $pendaftaran)
    {
        $pendaftaran->update([
            'status' => 'Diterima',
        ]);

        return back()->with(
            'success',
            'Pendaftar berhasil diterima.'
        );
    }

    public function tolak(Pendaftaran $pendaftaran)
    {
        $pendaftaran->update([
            'status' => 'Ditolak',
        ]);

        return back()->with(
            'success',
            'Pendaftar berhasil ditolak.'
        );
    }
}