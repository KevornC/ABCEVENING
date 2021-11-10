<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'gender',
        'title'
    ];

    public function courses(){
        return $this->hasMany(course::class,'teachers_id');
    }
    public function classes(){
        return $this->hasMany(classes::class,'id');
    }
    function assignedcourses(){
        return $this->hasMany(assignedcourses::class,'teacher_id');
    }
}
