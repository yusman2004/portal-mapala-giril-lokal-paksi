<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'email',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'angkatan',
        'alasan_bergabung',
        'status',
    ];
}