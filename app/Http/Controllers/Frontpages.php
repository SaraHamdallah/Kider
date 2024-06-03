<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontpages extends Controller
{
    public function home(){
        return view ('home');
    }


    public function about(){
        return view ('about');
    }

    public function classes(){
        return view ('classes');
    }

    public function contact(){
        return view ('contact');
    }
}
