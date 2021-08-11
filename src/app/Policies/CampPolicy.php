<?php

namespace App\Policies;

use App\Camp;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any camps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function view(?User $user, Camp $camp)
    {
        return true;
    }

    /**
     * Determine whether the user can create camps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function update(User $user, Camp $camp)
    {
        return $user->id === $camp->user_id;
    }

    /**
     * Determine whether the user can delete the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function delete(User $user, Camp $camp)
    {
        return $user->id === $camp->user_id;
    }
}
