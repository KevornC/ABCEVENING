<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'contact',
    ];

    public function courses(){
        return $this->hasMany(course::class);
    }
    function assignedcourses(){
        return $this->hasMany(assignedcourses::class,'student_id');
    }
}
