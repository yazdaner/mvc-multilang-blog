<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $guarded = [];


   public function posts()
   {
        return $this->morphedByMany(Post::class,'taggable');
   }
   public function newses()
   {
        return $this->morphedByMany(News::class,'taggable');
   }
   public function events()
   {
        return $this->morphedByMany(Event::class,'taggable');
   }
}
