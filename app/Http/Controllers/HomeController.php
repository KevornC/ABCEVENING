<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $T=Auth::User()->Status;
        // dd(Auth::User());
        if($T=='0'){
            return view('home');
            // return redirect()->route('TeacherDash');
        }elseif($T=='teacher' && $ts=='approved'){
            return redirect()->route('TeacherDash');
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
