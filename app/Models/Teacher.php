<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;


class Teacher extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'fullName',
        'phone',
        'facebook',
        'twitter',
        'instagram',
        'course_id',
        'image',
];
#this line to make relation many to many
public function course(){
    return $this->belongsTo(Course::class);
}
}
