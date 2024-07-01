<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;


class Frontpages extends Controller

{
    public function homePage(){
        $title = "Kider";
        $courses = Course::take(3)->where('publish', true)->get();          // Fetch only the published courses
        //dd($courses->count());
        $teachers = Teacher::take(3)->get();
        return view('Kider', compact('title', 'courses', 'teachers'));
    }

    public function about(){
        $title = "About";
        return view ('about', compact('title')); 
    }

    public function classes() {
        $title = "Classes";
        # Fetch only 3 and the published courses
    $courses = Course::take(3)->where('publish', true)->get();
        return view('classes', compact('title', 'courses'));
    }

    public function contact(){
        $title = "Contact";
        return view ('contact', compact('title'));
    }

    public function facilities(){
        $title = "Facilities";
        return view ('facilities', compact('title'));
    }

    public function team(){
        $title = "Teachers";
        // Fetch only 3 teachers
        $teachers = Teacher::take(3)->get();
        return view('team', compact('title', 'teachers'));
        }

    public function call(){
        $title = "Become A Teachers";
        return view ('call', compact('title'));
    }

    public function appointment(){
        $title = "Appointment";
        return view ('appointment', compact('title'));
    }

    public function testimonial(){
        $title = "Testimonial";
        return view ('testimonial', compact('title'));
    }

    public function error(){
        $title = "404 Error";
        return view ('error', compact('title'));
    }

}
