<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinkCatrgory extends Model
{
    use HasFactory;
    protected $table = "footer_link_catrgories";
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function links()
    {
        return $this->hasMany(FooterLink::class,'category_id');
    }
}
