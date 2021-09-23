<?php

namespace App\Policies;

use App\Models\Invoiced;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicedPolicy
{
    use HandlesAuthorization;
    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_PRODUCTION);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoiced  $invoiced
     * @return mixed
     */
    public function view(User $user, Invoiced $invoiced)
    {
        return $user->isGranted(User::ROLE_PRODUCTION);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_PRODUCTION);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoiced  $invoiced
     * @return mixed
     */
    public function update(User $user, Invoiced $invoiced)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoiced  $invoiced
     * @return mixed
     */
    public function delete(User $user, Invoiced $invoiced)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoiced  $invoiced
     * @return mixed
     */
    public function restore(User $user, Invoiced $invoiced)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoiced  $invoiced
     * @return mixed
     */
    public function forceDelete(User $user, Invoiced $invoiced)
    {
        //
    }
}
