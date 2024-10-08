<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing primary key (id)
            $table->string('course_name', 100); // Course name
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Foreign key to students table
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
