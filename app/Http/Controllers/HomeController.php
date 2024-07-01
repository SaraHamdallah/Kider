<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailToUser;


class HomeController extends Controller
{

    public function index()
    {
       
        return view('dashboard/home');    #return view('name of view', compact('name of variable'));
    }


    public function sendEmail(Request $request){
        
        $data = User::findOrFail(1)->toArray();  // get and put the data of client id 1 in array
        $data['theMessage'] = 'my message';   //added the message to the $data array
        // dd($data);
        Mail::to($data['email'])->send(       //send the email to the client email
            new EmailToUser($data)  // now will go to sendMail with array
    );
    return "mail sent";
    }

}
