<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;



class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'studentName',
        'birthDate',
    ];
    
#Define the many-to-many relationship in the Student and Course models.
public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

}

















//     /**
//      * Attach courses to the student.
//      *
//      * @param array $studentIds
//      * @return void
//      */

// #Using the Pivot Table in a Model Method
//     public function attachCourses(array $courseIds)
//     {
//         return $this->courses()->attach($courseIds);
//     }

//     /**
//      * Detach courses from the student.
//      *
//      * @param array $studentIds
//      * @return void
//      */
//     public function detachCourses(array $courseIds)
//     {
//         return $this->courses()->detach($courseIds);
//     }

//     /**
//      * Sync courses for the student.
//      *
//      * @param array $studentIds
//      * @return void
//      */

//     public function syncCourses(array $courseIds)
//     {
//         return $this->courses()->sync($courseIds);
//     }
