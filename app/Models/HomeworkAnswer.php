<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkAnswer extends Model
{
    use HasFactory;
    protected $table = "homework_answers";
    protected $guarded = [];
    public function getApprovedAttribute($approved){
        return $approved ? 'تایید شده' : 'تایید نشده';
    }
    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id');
    }
}
