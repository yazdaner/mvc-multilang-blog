<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    use HasFactory;
    protected $table = "footer_links";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(FooterLinkCatrgory::class,'category_id');
    }
}
