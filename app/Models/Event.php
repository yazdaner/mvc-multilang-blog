<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory,Sluggable;
    protected $table = "events";
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function getCommentsCount()
    {
        return $this->comments()->where('is_approved',1)->count();
    }

}
