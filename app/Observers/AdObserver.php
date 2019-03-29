<?php

namespace App\Observers;

use App\Ad;
use Illuminate\Support\Facades\Auth;

class AdObserver
{
    /**
     * @param Ad $ad
     * @return Ad
     */
    public function creating(Ad $ad)
    {
        $ad->user_id = Auth::id();

        return $ad;
    }
}
