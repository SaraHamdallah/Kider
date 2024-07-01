<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        # Retrieve courses
        $courses = Course::get();
        return view('dashboard/courses', compact('courses'));    #return view('name of view', compact('name of variable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$title = "classes";
        $courses = Course::with('teachers')->get();  // Fetch courses with their teachers
        //$courses = Course::all();
        //dd($courses); # Check if courses are fetched correctly
        return view('dashboard.addCourses', compact('courses')); //name of the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # Define custom error messages
        $messages = $this->errMsg();
        //dd($request->all());
        # Validate request data
        $data = $request->validate([
             'className' => 'required|string|max:100',
             'price' => 'required|numeric',
             'capacity' => 'required|integer|max:30',
             'image' => 'required',
             'age' => ['required', 'string', 'regex:/^\d{1,2}-\d{1,2}$/'],
             'startTime' => ['required', 'regex:/^(1[012]|[1-9])\s*-\s*(1[012]|[1-9])\s*AM$/i'],
             'publish' => 'nullable|boolean',
         ],$messages);

        //  dd($request->all());
        //  dd($request->hasFile('image'));
        #method is used to check if a file upload exists in the request
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

        $data['publish'] = $request->has('publish'); //isset($request->publish); #laravel wiil transfer if is set check boxx =1 and non = 0
        Course::create($data);
        return redirect()->route('courses')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Log the ID to ensure it's being passed correctly
        // \Log::info('Course ID: ' . $id);
        $course = Course::with('students')->findOrFail($id); #search for data id  ---  Will throw a 404 exception if not found
        //debugging statements to check if the correct ID is being passed and if the course is retrieved
        // if (!$course) {
        //     \Log::error('Course not found with ID: ' . $id);
        //     abort(404, 'Course not found');
        // }
        // Log the course details to verify
        // \Log::info('Course details: ' . json_encode($course));
        return view('dashboard.showCourse', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.editCourse', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
           'className' => 'required|string|max:100',
             'price' => 'required|numeric',
             'capacity' => 'required|integer|max:30',
             'image' => 'nullable|file|mimes:jpeg,jpg', // Validate the 'image' field as an image file
             'age' => ['required', 'string', 'regex:/^\d{1,2}-\d{1,2}$/'],
             'startTime' => 'required|string|max:100',
             'publish' => 'nullable|boolean',// Validate the 'active' field as boolean
        ],$messages);

        # Convert 'active' checkbox value to boolean
        //$data['publish'] = (bool)$data['publish'];
        $data['publish'] = isset($data['publish']) ? (bool) $data['publish'] : false;

        # Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/images';
            $image->move($path, $fileName);
            $data['image'] = $fileName; // Store the image path in the database
        }//else {
        # If no new image is uploaded, retain the existing image path
        //     unset($data['image']);
     // }

        # Update client data
        Course::where('id', $id)->update($data);
        return redirect('courses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Course::where('id', $id)->delete();
        return redirect('courses');
    }

    /**
     * trash
     */
    public function trash()
    {
        $trashed = Course::onlyTrashed()->get();
        return view('dashboard.trashCourse', compact('trashed'));
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Course::where('id', $id)->restore();
        return redirect('courses');
    }

    /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Course::where('id', $id)->forceDelete();
        return redirect('trashCourse');
    }


    /**
     * error custom message
     */

    public function errMsg(){
        return [
            'className.required' => 'The class name field is required.',
            'className.string' => 'The class name must be a string.',
            //'className.max' => 'The class name may not be greater than 100 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'capacity.required' => 'The capacity field is required.',
            'capacity.integer' => 'The capacity must be an integer.',
            //'capacity.max' => 'The capacity may not be greater than 30.',
            'image.required' => 'An image file is required.',
            'image.file' => 'The uploaded file must be a valid file.',
            //'image.mimes' => 'The image must be a JPEG or JPG file.',
            'age.required' => 'The age range field is required.',
            'age.regex' => 'The age range must be in format: 3-5.',
            'startTime.required' => 'The start time field is required.',
            'startTime.regex' => 'The start time must be in format: 9 - 10 AM.',      
        ];
    }
}
