<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "teachers";
        $teachers = Teacher::get();
        return view('dashboard/teachers', compact('title', 'teachers'));    #return view('name of view', compact('name of variable'));
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        return view('dashboard.addTeachers'); //name of the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'fullName' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'course_id' => 'required|exists:courses,id', // Ensure course_id is provided and exists in courses table

        ],$messages);
        if ($request->hasFile('image')) {
            $imgExt = $request->image->getClientOriginalExtension();
            $fileName = time() . '.' . $imgExt;
            $path = 'assets/images';
            $request->image->move($path, $fileName);
            $data['image'] = $fileName;
        }else {
        # Handle the case where no file was uploaded (set a default image or return an error response)
        //return 'No file uploaded.';
        return redirect()->back()->withErrors(['image' => 'No file uploaded.'])->withInput();
        }
        Teacher::create($data);
        return redirect()->route('teachers')->with('success', 'teacher added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id); #search for data id  ---  Will throw a 404 exception if not found
        return view('dashboard.showTeacher', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('dashboard.editTeacher', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
           'fullName' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ],$messages);
        # Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/images';
            $image->move($path, $fileName);
            $data['image'] = $fileName; // Store the image path in the database
        }
        # Update client data
        Teacher::where('id', $id)->update($data);
        return redirect('teachers');

#another solve
        // $teacher = Teacher::findOrFail($id);
        // $data = $request->validate([
        //     'fullName' => 'required|string|max:100',
        //     'phone' => 'required|string|max:50',
        //     'facebook' => 'nullable|string|max:255',
        //     'twitter' => 'nullable|string|max:255',
        //     'instagram' => 'nullable|string|max:255',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //  ]);

        // // Handle image upload
        // if (isset($request->image) && $request->hasFile('image')) {
        //     // Delete the old image if it exists
        //     if (isset($teacher->image) && $teacher->image) {
        //         $oldImagePath =('assets/img/' . $teacher->image);
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }
        //     // Store the new image
        // $fileName= $this->upload($request->image, 'assets/img');
        //         $data['image'] = $fileName;
        // } else {
        //     // Keep the old image if no new image is uploaded
        //     $data['image'] = $teacher->image;
        // }

        //     //Teacher:: where('id', $id)->update($data);
        //     $teacher->update($data);
        //     return redirect()->route('dashboard.teachers')->with('success', 'Teacher updated successfully');
        //     // return redirect('dashboard/teachers');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Teacher::where('id', $id)->delete();
        return redirect('teachers');
    }

    /**
     * trash
     */
    public function trash()
    {
        $trashed = Teacher::onlyTrashed()->get();
        return view('dashboard.trashTeachers', compact('trashed'));
    }


    /**
     * Restore
     */
    public function restore(string $id)
    {
        Teacher::where('id', $id)->restore();
        return redirect('teachers');
    }

    /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Teacher::where('id', $id)->forceDelete();
        return redirect('trashTeachers');
    }

    /**
     * error custom message
     */
    public function errMsg(){
        return [
            'fullName.required' => 'The name field is required.',
            'phone.string' => 'The phone must be a string.',
            'image.required' => 'An image file is required.',
            'className.required' => 'The class name field is required.',

        ];
    }
}
