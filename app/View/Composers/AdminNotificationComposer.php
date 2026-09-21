<?php

namespace App\View\Composers;

use Illuminate\View\View;

class AdminNotificationComposer
{
    public function compose(View $view)
    {
        $view->with('jumlahPesan', 0);
    }
}