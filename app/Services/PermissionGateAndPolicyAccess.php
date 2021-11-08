<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess()
    {

        $this->defineGateCategory();
        $this->defineGateArticle();
        $this->defineGateSettings();
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGatePer();
    }
    public function defineGateCategory()
    {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }

    public function defineGateArticle()
    {

        Gate::define('article-list', 'App\Policies\ArticlePolicy@view');
        Gate::define('article-add', 'App\Policies\ArticlePolicy@create');
        Gate::define('article-edit', 'App\Policies\ArticlePolicy@update');
        Gate::define('article-delete', 'App\Policies\ArticlePolicy@delete');
        Gate::define('article-preview', 'App\Policies\ArticlePolicy@preview');
    }

    public function defineGateSettings()
    {

        Gate::define('settings-list', 'App\Policies\SettingPolicy@view');
        Gate::define('settings-add', 'App\Policies\SettingPolicy@create');
        Gate::define('settings-edit', 'App\Policies\SettingPolicy@update');
        Gate::define('settings-delete', 'App\Policies\SettingPolicy@delete');
    }
    public function defineGateUser()
    {

        Gate::define('user-list', 'App\Policies\AdminPolicy@view');
        Gate::define('user-add', 'App\Policies\AdminPolicy@create');
        Gate::define('user-edit', 'App\Policies\AdminPolicy@update');
        Gate::define('user-delete', 'App\Policies\AdminPolicy@delete');
    }
    public function defineGateRole()
    {

        Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-add', 'App\Policies\RolePolicy@create');
        Gate::define('role-edit', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');
    }
    public function defineGatePer()
    {

        Gate::define('per-list', 'App\Policies\PerPolicy@view');
        Gate::define('per-delete', 'App\Policies\PerPolicy@delete');
    }

}