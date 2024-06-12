<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('home');
    }


    public function teachers(){
        $title = "teachers";
        return view ('dashboard/teachers', compact('title'));
    }

    public function students(){
        $title = "students";
        return view ('dashboard/students', compact('title'));
    }

    public function classes(){
        $title = "classes";
        return view ('dashboard/classes', compact('title'));
    }

}
