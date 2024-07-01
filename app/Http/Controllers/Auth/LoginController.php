<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $title;
    
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance. 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); //Applied to all methods except logout, ensuring only non-authenticated users can access login and registration pages.
        $this->middleware('auth')->only('logout');  //Applied to logout method only, ensuring only authenticated users can access the logout functionality.
        $this->title = 'Login Page';
    }
    
    public function showLoginForm()
    {
        return view('auth.login', ['title' => $this->title]);
    }


    public function login(Request $request)
{
    // Validate the form data
    $request->validate([
        'login' => 'required|string',
        'password' => 'required|string',
    ]);

    // Determine if the user is logging in with username or email
    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    // Create the credentials array
    $credentials = [
        $loginType => $request->login,
        'password' => $request->password,
    ];

    // Attempt to log the user in
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        // Authentication passed, regenerate the session
        $request->session()->regenerate();

        // Set session variables
        Session::put('username', Auth::user()->username);
        Session::put('name', Auth::user()->name);

        // Redirect to intended page
        return redirect()->intended($this->redirectTo);
    }

    // Authentication failed, return with error
    return back()->withErrors([
        'login' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('login', 'remember'));
}


public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



}