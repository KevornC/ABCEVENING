<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'schedule',
    ];

    function teacher(){
        return $this->belongsTo(teachers::class);
    }
    function course(){
        return $this->belongsTo(course::class);
    }

}
