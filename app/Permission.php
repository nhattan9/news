<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function perChild()
    {
        return $this->belongsTo(Permission::class,'parent_id');
    }

    public function permissionChildren()
    {
      return $this->hasMany(Permission::class,'parent_id')->orderBy('name','asc');
    }
}