<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    protected $table = "parent_categories";
    protected $guarded = [];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
