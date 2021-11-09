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
        return $this->hasMany(course::class);
    }
    public function classes(){
        return $this->hasMany(classes::class);
    }
}
