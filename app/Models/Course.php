<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'course_name',
        'student_id',
    ];

    // Define the relationship to the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

}
