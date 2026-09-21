<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            [
                'nama_kategori' => 'Kegiatan',
                'deskripsi' => 'Berita mengenai kegiatan MAPALA.'
            ],
            [
                'nama_kategori' => 'Prestasi',
                'deskripsi' => 'Prestasi anggota dan organisasi.'
            ],
            [
                'nama_kategori' => 'Ekspedisi',
                'deskripsi' => 'Informasi ekspedisi dan petualangan.'
            ],
            [
                'nama_kategori' => 'Informasi',
                'deskripsi' => 'Informasi umum organisasi.'
            ],
        ];

        foreach ($kategori as $item) {
            KategoriBerita::updateOrCreate(
                [
                    'nama_kategori' => $item['nama_kategori']
                ],
                $item
            );
        }
    }
}