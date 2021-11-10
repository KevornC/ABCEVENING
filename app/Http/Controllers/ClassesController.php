<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //
    function index(){
        return view('class.schedule');
    }
}
