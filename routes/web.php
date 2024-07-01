<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontpages;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Course_StudentController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController; 
use App\Mail\EmailToTeacher;


Route::get('/', function () {
    return view('welcome');
});


Route::get('kider',[Frontpages::class,'homePage'])->name('kider');
Route::get('about',[Frontpages::class,'about'])->name('about');
Route::get('classes',[Frontpages::class,'classes'])->name('classes');
Route::get('contact',[Frontpages::class,'contact'])->name('contact');
Route::get('facilities',[Frontpages::class,'facilities'])->name('page/facilities');
Route::get('team',[Frontpages::class,'team'])->name('page/team');
Route::get('call',[Frontpages::class,'call'])->name('page/call');
Route::get('appointment',[Frontpages::class,'appointment'])->name('page/appointment');
Route::get('testimonial',[Frontpages::class,'testimonial'])->name('page/testimonial');
Route::get('error', [Frontpages::class, 'error'])->name('page/error');


#LOGIN USING SOCIAL MEDIA
Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect(); //link to facebook
    })->name('facebookRedirect');
Route::get('/auth/callback', function () {
$user = Socialite::driver('facebook')->user(); //link to recive data array from facebook to this link
});

#send email to teacher
Route::get('sendEmail',[HomeController::class,'sendEmail'])->name('send_Email');



Auth::routes(['verify' => true]);
Route::prefix('admin')->middleware('verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::get('/addTeachers', [TeacherController::class, 'create']);
    Route::post('addTeachers', [TeacherController::class, 'store'])->name('addTeachers');
    Route::get('/showTeacher/{id}', [TeacherController::class, 'show'])->name('showTeacher');
    Route::get('editTeacher/{id}', [TeacherController::class, 'edit'])->name('editTeacher');
    Route::put('updateTeacher/{id}', [TeacherController::class, 'update'])->name('updateTeacher');
    Route::delete('delTeacher/{id}',[TeacherController::class,'destroy'])->name('delTeacher');
    Route::get('trashTeachers',[TeacherController::class,'trash'])->name('trashTeachers');
    Route::get('restoreTeacher/{id}',[TeacherController::class,'restore'])->name('restoreTeacher');
    Route::delete('forceDeleteTeacher',[TeacherController::class,'forceDelete'])->name('forceDeleteTeacher');
    
    Route::get('courses', [CourseController::class, 'index'])->name('courses');
    Route::get('addCourses', [CourseController::class, 'create']);
    Route::post('addCourses', [CourseController::class, 'store'])->name('addCourses');
    Route::get('showCourse/{id}', [CourseController::class, 'show'])->name('showCourse');
    Route::get('editCourse/{id}', [CourseController::class, 'edit'])->name('editCourse');
    Route::put('updateCourse/{id}', [CourseController::class, 'update'])->name('updateCourse');
    Route::delete('delCourse/{id}',[CourseController::class,'destroy'])->name('delCourse');
    Route::get('trashCourse',[CourseController::class,'trash'])->name('trashCourse');
    Route::get('restoreCourse/{id}',[CourseController::class,'restore'])->name('restoreCourse');
    Route::delete('forceDeleteCourse',[CourseController::class,'forceDelete'])->name('forceDeleteCourse');
    
    Route::get('students', [StudentController::class, 'index'])->name('students');
    Route::get('addStudents', [StudentController::class, 'create']);
    Route::post('addStudents', [StudentController::class, 'store'])->name('addStudents');
    Route::get('showStudent/{id}', [StudentController::class, 'show'])->name('showStudent');
    Route::get('editStudent/{id}', [StudentController::class, 'edit'])->name('editStudent');
    Route::put('updateStudent/{id}', [StudentController::class, 'update'])->name('updateStudent');
    Route::delete('delStudent/{id}',[StudentController::class,'destroy'])->name('delStudent');
    Route::get('trashStudents',[StudentController::class,'trash'])->name('trashStudents');
    Route::get('restoreStudent/{id}',[StudentController::class,'restore'])->name('restoreStudent');
    Route::delete('forceDeleteStudent',[StudentController::class,'forceDelete'])->name('forceDeleteStudent');
    
    // Route::get('CoursesStudent', [Course_StudentController::class, 'index'])->name('CoursesStudent');
    Route::get('addCourseStudent', [Course_StudentController::class, 'create']);
    Route::post('addCourseStudent', [Course_StudentController::class, 'store'])->name('addCourseStudent');;



    # Email verification routes
// Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->middleware(['auth', 'verified'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->middleware(['auth'])->name('verification.resend');
});

// Route::get('/test-email', function () {
//     Mail::raw('This is a test email', function ($message) {
//         $message->to('test@example.com')
//                 ->subject('Test Email');
//     });
//     return 'Test email sent!';
// });






