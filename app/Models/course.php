<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_nm',
        'course_start',
        'course_ends',
        'exam_year'
    ];

    function teacher(){
        return $this->belongsTo(teachers::class);
    }
    function student(){
        return $this>belongsTo(student::Class);
    }
    public function classes(){
        return $this->hasMany(classes::class);
    }
}
