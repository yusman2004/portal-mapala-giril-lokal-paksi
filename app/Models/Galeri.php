<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'kegiatan_id',
        'judul',
        'foto',
        'keterangan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(
            Kegiatan::class,
            'kegiatan_id'
        );
    }
}