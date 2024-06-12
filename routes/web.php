<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontpages;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('kider',[Frontpages::class,'homePage'])->name('homePage');
Route::get('about',[Frontpages::class,'about'])->name('about');
Route::get('classes',[Frontpages::class,'classes'])->name('classes');
Route::get('contact',[Frontpages::class,'contact'])->name('contact');
Route::get('facilities',[Frontpages::class,'facilities'])->name('page/facilities');
Route::get('team',[Frontpages::class,'team'])->name('page/team');
Route::get('call',[Frontpages::class,'call'])->name('page/call');
Route::get('appointment',[Frontpages::class,'appointment'])->name('page/appointment');
Route::get('testimonial',[Frontpages::class,'testimonial'])->name('page/testimonial');
Route::get('error', [Frontpages::class, 'error'])->name('page/error');


//Route::get('users',[DashBoardController::class,'users'])->name('users');
//Route::get('dashb',[DashBoardController::class,'dashb'])->name('dash');

Auth::routes();

Route::prefix('admin')->group(function () {

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('teachers', [App\Http\Controllers\HomeController::class, 'teachers'])->name('teachers');
Route::get('students', [App\Http\Controllers\HomeController::class, 'students'])->name('students');
Route::get('classes', [App\Http\Controllers\HomeController::class, 'classes'])->name('classes');

});




