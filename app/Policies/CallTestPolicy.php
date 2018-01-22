<?php

namespace App\Policies;

use App\User;
use App\Models\Painel\Call;
use Illuminate\Auth\Access\HandlesAuthorization;

class CallTestPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the call.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Painel\Call  $call
     * @return mixed
     */
    public function view(User $user, Call $call)
    {
        return $user->id == $call->user_id;
    }

    /**
     * Determine whether the user can create calls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true; //todos os usuários poderão criar um chamado
    }

    /**
     * Determine whether the user can update the call.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Painel\Call  $call
     * @return mixed
     */
    public function update(User $user, Call $call)
    {
        return $user->id == $call->user_id;
    }

    /**
     * Determine whether the user can delete the call.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Painel\Call  $call
     * @return mixed
     */
    public function delete(User $user, Call $call)
    {
        return $user->id == $call->user_id;
    }
}
