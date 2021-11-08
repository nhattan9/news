<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role', 'admin_id', 'role_id')
            ->withTimestamps();
    }

    public function checkPermissionAccess($permissionCheck)
    {
        //B1 :Lấy được tất cả các quyền của user login vào hệ thống

        $roles = Auth()->guard('admin')->user()->roles;
        foreach ($roles as $role) {
            $permissions = $role->pers;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
        //B2: so sánh giá trị dduuaw vào của router  hiện tại xem có tồn tại các quyền mình lấy được hay ko  /
    }
}