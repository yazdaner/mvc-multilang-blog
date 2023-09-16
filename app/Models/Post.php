<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,Sluggable;
    protected $table = "posts";
    protected $guarded = [];
    protected $appends = ['is_user_bookmarked'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function getCommentsCount()
    {
        return $this->comments()->where('is_approved',1)->count();
    }

    public function getBannerPost()
    {
        return asset(env('BANNER_IMAGES_PATH').$this->banner);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'likes');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(User::class,'bookmarks');
    }

    public function getIsUserLikedAttribute()
    {
        if(!isset(auth()->user()->id)){
            return false;
        }
        return $this->likes()->where('user_id',auth()->user()->id)->exists();
    }
    public function getIsUserBookmarkedAttribute()
    {
        if(!isset(auth()->user()->id)){
            return false;
        }
        return $this->bookmarks()->where('user_id',auth()->user()->id)->exists();
    }

    public function getPostLikeCount()
    {

        return $this->likes()->count();
    }


    public function language()
    {
        return $this->belongsTo(Language::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

}
