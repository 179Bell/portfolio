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
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function view(User $user, Camp $camp)
    {
        //
    }

    /**
     * Determine whether the user can create camps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
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
        //
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
        //
    }

    /**
     * Determine whether the user can restore the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function restore(User $user, Camp $camp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the camp.
     *
     * @param  \App\User  $user
     * @param  \App\Camp  $camp
     * @return mixed
     */
    public function forceDelete(User $user, Camp $camp)
    {
        //
    }
}
