<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class Course_StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #retrieve courses with their student 
        $title = "student with class";
        $students = Student::with('courses')->get();
        return view('CoursesStudent', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add student to class";
        $students = Student::all();
        $courses = Course::all(); 
        return view('dashboard.addCourseStudent', compact('title', 'students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    # Validate the incoming request data
    $data = $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    # Log the received data
    Log::info('Received data:', $data);

    # Check if the course already has 3 students
    $course = Course::findOrFail($data['course_id']);
    if ($course->students->count() >= 3) {
        Log::warning('Class has maximum number of students', ['course_id' => $course->id]);
        return redirect()->back()->with('error', 'This class already has the maximum number of students (3).');
    }

    # Find the student by ID
    $student = Student::findOrFail($data['student_id']);

    # Log student and course information
    Log::info('Student found:', ['student' => $student->toArray()]);
    Log::info('Course found:', ['course' => $course->toArray()]);

    # Attach the course to the student
    $student->courses()->attach($data['course_id']);

    # Log the attach operation
    Log::info('Course attached to student', ['student_id' => $student->id, 'course_id' => $course->id]);
    return ("Student added to course successfully.");
    // return view('dashboard.CoursesStudent');
    // //return redirect()->route('courseStudent')->with('success', 'Student added to course successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $student = Student::findOrFail($id); #search for data id  ---  Will throw a 404 exception if not found
        // return view('dashboard.showCourseStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $student = Student::findOrFail($id);
        // return view('dashboard.editCoursesStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //     #It reassigns records to the newly provided assignments.
    //     //$courses  = [4, 5];
    //     // Validate the incoming request data
    //     $request->validate([
    //     'course_id' => 'required|array',
    //     'course_id.*' => 'exists:courses,id',
    // ]);
    //     // Find the student by ID
    //     $student = Student::find($id);
    //     // Check if student is found
    // //     if (!$student) {
    // //     return redirect()->route('students.index')->with('error', 'Student not found');
    // // }
    //     $student->courses()->sync($request->input('course_id'));
    //     return redirect()->route('courseStudent')->with('success', 'Student updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // #If I have a student record that wants to close down, I would also want to remove its attachment, meaning the courses
        // $student = Student::find($id);
        // $student->courses()->detach();

        // $student->delete();
        // // Return a response or redirect
        // return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

    

//     public function destroy(string $id)
// {
//     // Find the student by ID
//     $student = Student::find($id);

//     // Check if student is found
//     if (!$student) {
//         return redirect()->route('students.index')->with('error', 'Student not found');
//     }

//     // Use transaction to ensure both operations succeed
//     \DB::transaction(function () use ($student) {
//         // Detach all courses associated with the student
//         $student->courses()->detach();

//         // Delete the student
//         $student->delete();
//     });

//     // Return a response or redirect
//     return redirect()->route('students.index')->with('success', 'Student deleted successfully');
// }
}
