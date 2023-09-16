<?php

namespace App\Models;

use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }

    public function getUserProfile()
    {
        if (isset($this->avatar)) {
            return asset(env('USER_IMAGES_PATH') . $this->avatar->image);
        } else {
            return asset('image/user.png');
        }
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function newses()
    {
        return $this->hasMany(News::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function getlessonsId()
    {
        return $this->lessons->pluck('id')->toArray();
    }

}
