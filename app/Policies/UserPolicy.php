<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //qui dit un user n’a pas droit de converser sois même, si user connecter est different de user à qui on veut s'adresser
    public function talkTo(User $user, User $to){
        return $user->id !== $to->id;
    }
}