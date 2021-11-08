<?php

namespace App\Policies;

use App\Category;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-category'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.add-category'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.edit-category'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-category'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(Admin $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(Admin $user, Category $category)
    {
        //
    }
}
