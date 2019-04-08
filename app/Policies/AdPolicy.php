<?php

namespace App\Policies;

use App\Ad;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    public function change(User $user, Ad $ad): bool
    {
        return $user->id === $ad->user_id;
    }
}
