<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Painel\Call;

class CallPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if ($user->eAdmin()) {
            return true;
        }
    }

    public function viewCall($user, Call $call){
        return $user->id == $call->user_id;
    }





}
