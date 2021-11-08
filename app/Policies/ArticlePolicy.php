<?php

namespace App\Policies;

use App\Article;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-article'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.add-article'));

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(Admin $user, $id)
    {
        $article = Article::find($id);

        if ($user->checkPermissionAccess(config('permissions.access.edit-article')) && $article->author_id === $user->id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-article'));

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function restore(Admin $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function preview(Admin $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.preview-article'));

    }
}