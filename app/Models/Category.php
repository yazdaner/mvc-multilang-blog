<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory ,Sluggable;

    protected $table = "categories";
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }

    public function parent()
    {
        return $this->belongsTo(ParentCategory::class,'parent_id');
    }



    public function getParentName()
    {
        return $this->parent->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id');
    }

    public function newses()
    {
        return $this->hasMany(News::class,'category_id');
    }
}
