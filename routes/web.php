<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return view('course.course');
})->name('welcome');
// route::view('/add','course.course');
Route::get('/log', [\App\Http\Controllers\HomeController::class, 'log'])->name('log');
Auth::routes();

Route::middleware(['auth'])->group(function () {

//admin


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ABC/Evening/Teacher', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');
Route::get('/ABC/Evening/Course', [\App\Http\Controllers\CourseController::class, 'index'])->name('course');
Route::get('/ABC/Evening/Student', [\App\Http\Controllers\StudentController::class, 'index'])->name('students');
Route::get('/ABC/Evening/ClassSchedule', [\App\Http\Controllers\ClassesController::class, 'index'])->name('schedule');

//Teacher


//student

});
