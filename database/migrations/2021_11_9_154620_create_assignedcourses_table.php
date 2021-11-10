<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignedcourses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students','id');
            $table->foreignId('teacher_id')->constrained('teachers','id');
            $table->foreignId('course_id')->constrained('courses','id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignedcourses');
    }
}
