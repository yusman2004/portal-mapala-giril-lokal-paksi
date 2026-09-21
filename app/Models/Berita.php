<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi',
        'gambar',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriBerita::class,
            'kategori_id'
        );
    }
}