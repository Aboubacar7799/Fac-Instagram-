<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function follow(User $authUser, Profil $profil){
        return $authUser->profil->id !== $profil->id;
    }
}
