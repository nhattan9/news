<?php

namespace App\Policies;

use App\Setting;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
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
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function view(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-settings'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.add-settings'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.edit-settings'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-settings'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Setting  $setting
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
     * @param  \App\Setting  $setting
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}