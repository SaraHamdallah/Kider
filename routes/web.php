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