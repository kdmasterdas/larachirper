<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chirp;

class ChirpPolicy
{
    public function update(User $user, Chirp $chirp)
    {
        return $user->id === $chirp->user_id;
    }

    public function delete(User $user, Chirp $chirp)
    {
        return $user->id === $chirp->user_id;
    }
}
