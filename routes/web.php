<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontpages;
Route::get('/', function () {
    return view('test');
});

Route::get('home',[Frontpages::class,'home'])->name('home');
Route::get('about',[Frontpages::class,'about'])->name('about');
Route::get('classes',[Frontpages::class,'classes'])->name('classes');
Route::get('contact',[Frontpages::class,'contact'])->name('contact');
Route::get('facilities',[Frontpages::class,'facilities'])->name('page/facilities');
Route::get('team',[Frontpages::class,'team'])->name('page/team');
Route::get('call',[Frontpages::class,'call'])->name('page/call');
Route::get('appointment',[Frontpages::class,'appointment'])->name('page/appointment');
Route::get('testimonial',[Frontpages::class,'testimonial'])->name('page/testimonial');
//Route::get('404',[Frontpages::class,'page'])->name('page/page');
Route::get('error', [Frontpages::class, 'error'])->name('page/error');