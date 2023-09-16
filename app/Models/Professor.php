<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = "professors";
    protected $guarded = [];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}