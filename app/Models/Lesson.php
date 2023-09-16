<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = "lessons";
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
