<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
    'as' => 'index',
    'uses' => 'HomeController@index',
]);
Route::get('/loadMore', [
    'as' => 'loadMore',
    'uses' => 'HomeController@loadMore',
]);
Route::get('/danhmuc/{slug}/{id}', [
    'as' => 'category.article',
    'uses' => 'CategoryController@index',
]);
Route::get('/chitiet/{id}/{slug}', [
    'as' => 'detail.article',
    'uses' => 'ArticleController@index',
]);

Route::prefix('user')->name('user.')->group(function () {

    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::post('/check', [UserController::class, 'check'])->name('check');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
    Route::get('/info',  [UserController::class, 'info'])->name('info');
    Route::get('/my-account',  [UserController::class, 'myAccount'])->name('myAccount');
    Route::post('/update-account',  [UserController::class, 'updateAccount'])->name('updateAccount');
    Route::post('/change-password',  [UserController::class, 'changePassword'])->name('changePassword');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin'])->group(function () {
        // Route::view('/home', 'admin.home')->name('home');
        Route::get('/home', [AdminIndexController::class, 'index'])->name('home');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::prefix('categories')->group(function () {
            Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'Admin\AdminCategoryController@index',
                'middleware' => 'can:category-list'
            ]);
            Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'Admin\AdminCategoryController@create',
                'middleware' => 'can:category-add'
            ]);
            Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'Admin\AdminCategoryController@store',
            ]);
            Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'Admin\AdminCategoryController@edit',
                'middleware' => 'can:category-edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'Admin\AdminCategoryController@update',
            ]);
            Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'Admin\AdminCategoryController@delete',
                'middleware' => 'can:category-delete'
            ]);
        });

        Route::prefix('articles')->group(function () {
            Route::get('/', [
                'as' => 'articles.index',
                'uses' => 'Admin\AdminArticleController@index',
                'middleware' => 'can:article-list'

            ]);
            Route::get('/create', [
                'as' => 'articles.create',
                'uses' => 'Admin\AdminArticleController@create',
                'middleware' => 'can:article-add'
            ]);
            Route::post('/store', [
                'as' => 'articles.store',
                'uses' => 'Admin\AdminArticleController@store',
            ]);
            Route::get('/preview-article/{id}', [
                'as' => 'articles.preview',
                'uses' => 'Admin\AdminArticleController@preview',
                'middleware' => 'can:article-preview'

            ]);
            Route::get('/edit/{id}', [
                'as' => 'articles.edit',
                'uses' => 'Admin\AdminArticleController@edit',
                'middleware' => 'can:article-edit,id'
            ]);
            Route::post('/update/{id}', [
                'as' => 'articles.update',
                'uses' => 'Admin\AdminArticleController@update',
            ]);
            Route::get('/article-format', [
                'as' => 'articles.format',
                'uses' => 'Admin\AdminArticleController@articleFormat',
            ]);
            Route::get('/delete/{id}', [
                'as' => 'articles.delete',
                'uses' => 'Admin\AdminArticleController@delete',
                'middleware' => 'can:article-delete'
            ]);
        });
        Route::prefix('settings')->group(function () {
            Route::get('/', [
                'as' => 'settings.index',
                'uses' => 'Admin\SettingController@index',
                'middleware' => 'can:settings-list'

            ]);
            Route::get('/create', [
                'as' => 'settings.create',
                'uses' => 'Admin\SettingController@create',
                'middleware' => 'can:settings-add'

            ]);
            Route::post('/store', [
                'as' => 'settings.store',
                'uses' => 'Admin\SettingController@store',
            ]);
            Route::get('/edit/{id}', [
                'as' => 'settings.edit',
                'uses' => 'Admin\SettingController@edit',
                'middleware' => 'can:settings-edit'

            ]);
            Route::post('/update/{id}', [
                'as' => 'settings.update',
                'uses' => 'Admin\SettingController@update',
            ]);
            Route::get('/delete/{id}', [
                'as' => 'settings.delete',
                'uses' => 'Admin\SettingController@delete',
                'middleware' => 'can:settings-delete'

            ]);
        });
        Route::prefix('users')->group(function () {
            Route::get('/', [
                'as' => 'users.index',
                'uses' => 'Admin\AdminUserController@index',
                'middleware' => 'can:user-list'

            ]);
            Route::get('/create', [
                'as' => 'users.create',
                'uses' => 'Admin\AdminUserController@create',
                'middleware' => 'can:user-add'

            ]);
            Route::post('/store', [
                'as' => 'users.store',
                'uses' => 'Admin\AdminUserController@store',
            ]);
            Route::get('/edit/{id}', [
                'as' => 'users.edit',
                'uses' => 'Admin\AdminUserController@edit',
                'middleware' => 'can:user-edit'

            ]);
            Route::post('/update/{id}', [
                'as' => 'users.update',
                'uses' => 'Admin\AdminUserController@update',
            ]);
            Route::get('/settings/{id}', [
                'as' => 'users.delete',
                'uses' => 'Admin\AdminUserController@delete',
                'middleware' => 'can:user-delete'

            ]);
            Route::get('/info', [
                'as' => 'users.info',
                'uses' => 'Admin\AdminUserController@info',
            ]);
        });
        Route::prefix('permissions')->group(function () {
            Route::get('/', [
                'as' => 'permissions.index',
                'uses' => 'Admin\PermissionController@index',
                'middleware' => 'can:per-list'

            ]);
            Route::post('/store', [
                'as' => 'permissions.store',
                'uses' => 'Admin\PermissionController@store',
            ]);
            Route::get('/delete/{id}', [
                'as' => 'permissions.delete',
                'uses' => 'Admin\PermissionController@delete',
                'middleware' => 'can:per-delete'

            ]);
        });
        Route::prefix('roles')->group(function () {
            Route::get('/', [
                'as' => 'roles.index',
                'uses' => 'Admin\RoleController@index',
                'middleware' => 'can:role-list'

            ]);
            Route::get('/create', [
                'as' => 'roles.create',
                'uses' => 'Admin\RoleController@create',
                'middleware' => 'can:role-add'

            ]);
            Route::post('/store', [
                'as' => 'roles.store',
                'uses' => 'Admin\RoleController@store',

            ]);
            Route::get('/edit/{id}', [
                'as' => 'roles.edit',
                'uses' => 'Admin\RoleController@edit',
                'middleware' => 'can:role-edit'

            ]);
            Route::post('/update/{id}', [
                'as' => 'roles.update',
                'uses' => 'Admin\RoleController@update',
            ]);
            Route::get('/delete/{id}', [
                'as' => 'roles.delete',
                'uses' => 'Admin\RoleController@delete',
                'middleware' => 'can:role-delete'

            ]);
        });
        Route::get('/myArticle', [
            'as' => 'myArticle',
            'uses' => 'Admin\AdminArticleController@myArticle',
        ]);
        //Xoa comment
        Route::get('/comment/delete/{id}', [
            'as' => 'comment.delete',
            'uses' => 'CommentController@delete',
        ]);
    });
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});