<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    public function run()
    {
        $pengurus = [
            [
                'nama' => 'Ketua MAPALA',
                'jabatan' => 'Ketua Umum',
                'periode' => '2026 - 2027',
                'urutan' => 1,
            ],
            [
                'nama' => 'Wakil Ketua',
                'jabatan' => 'Wakil Ketua',
                'periode' => '2026 - 2027',
                'urutan' => 2,
            ],
            [
                'nama' => 'Sekretaris MAPALA',
                'jabatan' => 'Sekretaris',
                'periode' => '2026 - 2027',
                'urutan' => 3,
            ],
            [
                'nama' => 'Bendahara MAPALA',
                'jabatan' => 'Bendahara',
                'periode' => '2026 - 2027',
                'urutan' => 4,
            ],
        ];

        foreach ($pengurus as $item) {
            Pengurus::updateOrCreate(
                [
                    'jabatan' => $item['jabatan']
                ],
                $item
            );
        }
    }
}