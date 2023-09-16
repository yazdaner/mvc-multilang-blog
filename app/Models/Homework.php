<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $table = "homework";
    protected $guarded = [];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
    public function answers()
    {
        return $this->hasMany(HomeworkAnswer::class,'homework_id');
    }
}
