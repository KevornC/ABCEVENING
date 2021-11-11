<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\teachers;
use App\Models\student;
use App\Models\course;
use App\Models\classes;
use App\Models\assignedcourses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $T=Auth::User()->status;
        // dd(Auth::User());
        if($T==0){
            $teachers=teachers::count();
            $courses=course::count();
            $students=student::count();
            return view('home',compact('teachers','students','courses'));
        }elseif($T==1){
            $teacher=teachers::where('user_id',Auth::user()->id)->get();
            foreach ($teacher as $key) {
                $teacher_id=$key->id;
            }
            $schedule=classes::with('teacher','course')->where('teacher_id',$teacher_id)->get();
            return view('teacher',compact('schedule'));
        }else{
            $student=student::where('user_id',Auth::user()->id)->get();
            foreach ($student as $key) {
                $student_id=$key->id;
            }
            $teacher=assignedcourses::where('student_id',$student_id)->get();
            foreach ($teacher as $key) {
                $teacher_id=$key->teacher_id;
                $course_id=$key->course_id;
            }
            $schedule=classes::with('teacher','course')->where('teacher_id',$teacher_id)
                ->where('course_id',$course_id)->get();
            return view('student',compact('schedule',));
        }
        
    }
  
public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
