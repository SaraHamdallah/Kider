<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontpages extends Controller
{
    public function home(){
        $title = "Kider";
        return view ('home', compact('title'));
    }

    public function about(){
        $title = "About";
        return view ('about', compact('title'));
    }

    public function classes(){
        $title = "Classes";
        return view ('classes', compact('title'));
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
        return view ('team', compact('title'));
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


    public function dash(){
        return view ('dash');
    }

    public function register(){
        return view ('register');
    }

    public function login(){
        return view ('login');
    }
}
