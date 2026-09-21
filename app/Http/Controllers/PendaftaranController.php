<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('pendaftaran.create');
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
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',
            'angkatan.required' => 'Angkatan wajib diisi.',
            'alasan_bergabung.required' => 'Alasan bergabung wajib diisi.',
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
            'status' => 'Menunggu',
        ]);

        return redirect()
            ->route('pendaftaran.sukses')
            ->with(
                'success',
                'Pendaftaran berhasil dikirim.'
            );
    }

    public function sukses()
    {
        return view('pendaftaran.sukses');
    }
}