<?php

namespace App\Policies;

use App\Admin;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function viewAny(Admin  $admin)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view( Admin $admin)
    {
        return $admin->checkPermissionAccess(config('permissions.access.list-user'));

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->checkPermissionAccess(config('permissions.access.add-user'));

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $admin->checkPermissionAccess(config('permissions.access.edit-user'));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete( Admin $admin)
    {
        return $admin->checkPermissionAccess(config('permissions.access.delete-user'));

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function restore( Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function forceDelete(Admin $admin)
    {
        //
    }
}