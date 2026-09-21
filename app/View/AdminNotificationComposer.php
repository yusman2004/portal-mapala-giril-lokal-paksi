<?php

namespace App\View\Composers;

use App\Models\Pesan;
use Illuminate\View\View;

class AdminNotificationComposer
{
    public function compose(View $view)
    {
        $jumlahPesan = 0;

        try {
            if (class_exists(Pesan::class)) {
                $jumlahPesan = Pesan::where('status', 'belum dibaca')->count();
            }
        } catch (\Throwable $e) {
            $jumlahPesan = 0;
        }

        $view->with('jumlahPesan', $jumlahPesan);
    }
}