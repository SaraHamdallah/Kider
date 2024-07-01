<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "students";
        $students = Student::get();
        return view('dashboard/students', compact('title', 'students'));    #return view('name of view', compact('name of variable')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addStudents'); //name of the form
        // $student = new \App\Models\Student(); // Creating an empty student instance
        // return view('dashboard.addStudents', compact('student'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'studentName' => 'required|string|max:100',
            'birthDate' => 'required|string|max:30',
        ],$messages);

        $student =Student::create($data);
        return redirect()->route('students')->with('success', 'students added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('courses')->findOrFail($id); #search for data id  ---  Will throw a 404 exception if not found
        //dd($student);
        return view('dashboard.showStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.editStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
           'studentName' => 'required|string|max:100',
            'birthDate' => 'required|string|max:30',
        ],$messages);
        
        # Update client data
        Student::where('id', $id)->update($data);
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Student::where('id', $id)->delete();
        return redirect('students');
    }

    /**
     * trash
     */
    public function trash()
    {
        $trashed = Student::onlyTrashed()->get();
        return view('dashboard.trashStudents', compact('trashed'));
    }


    /**
     * Restore
     */
    public function restore(string $id)
    {
        Student::where('id', $id)->restore();
        return redirect('students');
    }

    /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Student::where('id', $id)->forceDelete();
        return redirect('trashStudents');
    }


//     public function updateStudentCourses($studentId, Request $request)
// {
//     // Validate the request to ensure 'course_id' is an array and each ID exists in the 'courses' table
//     $validatedData = $request->validate([
//         'course_id' => 'required|array',
//         'course_id.*' => 'exists:courses,id',
//     ]);

//     // Find the student by ID
//     $student = Student::findOrFail($studentId);

//     // Sync the student's courses with the provided course IDs
//     $student->courses()->sync($validatedData['course_id']);

//     return redirect()->route('students.index')->with('success', 'Student courses updated successfully.');
// }




    /**
     * error custom message
     */
    public function errMsg(){
        return [
            'studentName.required' => 'The class name field is required.',
            'birthDate.string' => 'The class name must be a string.',
        ];
    }

}
