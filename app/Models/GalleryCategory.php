<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;
    protected $table = "gallery_categories";
    protected $guarded = [];


    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function images()
    {
        return $this->hasMany(Gallery::class,'category_id');
    }
}
