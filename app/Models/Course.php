<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
            'className',
            'price',
            'age',
            'startTime',
            'capacity',
            'image',
            'publish',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    // public function attachStudents(array $studentIds)
    // {
    //     return $this->students()->attach($studentIds);
    // }

    // public function syncStudents(array $studentIds)
    // {
    //     return $this->students()->sync($studentIds);
    // }
}
