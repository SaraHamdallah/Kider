<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{

    public function dashb(){
        return view ('dash');
    }
    // public function users(){
    //     $title = "users";
    //     return view ('usersTable', compact('title'));
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register'); #name of the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations',
            'username' => 'required|string|max:255|unique:registrations',
            'password' => 'required|string|min:8',
            'terms' => 'required', // Validate the terms checkbox
        ],$messages);

        $data['password'] = Hash::make($data['password']);
        //$data['terms_accepted'] = isset($request->active); #laravel wiil transfer if is set check boxx =1 and non = 0
        $data['terms'] = $request->has('terms') ? 1 : 0; // Set terms based on checkbox
        //$data['terms'] = isset($request->active);
        Registration::create($data);
        return redirect('dashb')->with('success', 'User created successfully.');;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * error custom message
     */
    public function errMsg(){
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'password.required' => 'The password field is required.',
            //'password.confirmed' => 'The password confirmation does not match.',
            'terms.required' => 'You must agree to the terms and conditions.',     

        ];
    }

    /**
     * Login Form
     */
    public function loginForm()
    {
        return view('login');
    }

    /**
     * Authenticate Registration
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashb');
        }

        return back()->withErrors([
            'username' => 'The provided username or password do not match our records.',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
