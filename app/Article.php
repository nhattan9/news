<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function tags(){
        return $this->belongsToMany(Tag::class,'article_tags','article_id','tag_id')
                    ->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'author_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'article_id');
    }
   
}