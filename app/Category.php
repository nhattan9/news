<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function categoryChild()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id')->latest();
    }
    public function article()
    {
        return $this->hasMany(Article::class, 'category_id')->latest()->take(1);
    }
}