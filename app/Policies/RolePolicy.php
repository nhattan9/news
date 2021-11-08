<?php

namespace App\Policies;

use App\Role;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-role'));

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.add-role'));

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.edit-role'));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-role'));

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}