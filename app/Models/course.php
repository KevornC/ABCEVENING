<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_nm',
        'teachers_id',
        'course_start',
        'course_ends',
        'exam_year'
    ];

    public function teacher(){
        return $this->belongsTo(teachers::class,'teachers_id');
    }
    public function student(){
        return $this>belongsTo(student::class,'id');
    }
    public function classes(){
        return $this->hasMany(classes::class,'id');
    }

    function assignedcourses(){
        return $this->hasMany(assignedcourses::class,'course_id');
    }
}
