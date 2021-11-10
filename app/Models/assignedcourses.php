<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignedcourses extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'teacher_id',
        'course_id'
    ];

    function student(){
        return $this->belongsTo(student::class,'student_id');
    }
    function teacher(){
        return $this->belongsTo(teachers::class,'teacher_id');
    }
    function course(){
        return $this->belongsTo(course::class,'course_id');
    }
}
