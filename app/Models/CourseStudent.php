<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    protected $table = 'course_student'; //name of the migration table
    protected $fillable = ['student_id', 'course_id'];



    public function student()
    {
        return $this->belongsTo(Student::class, 'child_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
