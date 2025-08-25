<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function showAdminCourses($id = null)
{
    if ($id) {
        // Return a single course
        $course = Course::findOrFail($id);
        return response()->json($course);
    }
    
    // Return all courses for the admin view
    $courses = Course::all();
    return view('admin.adminpages.admincourse', compact('courses'));
}
    
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'description' => 'nullable|string', // Added validation for description
            'topics' => 'nullable|string',      // Added validation for topics
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'views' => 'nullable|integer',      // Changed from string to integer
            'time' => 'nullable|integer',       // Changed from number to integer
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|integer',   // Changed from number to integer
            'lessons' => 'nullable|integer',
            'price' => 'nullable|integer',      // Changed from number to integer
        ]);

        $courseData = $validated;

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $courseData['thumbnail'] = Storage::url($path);
        }

        $course = Course::create($courseData);

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course
        ], 201);
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        // Fetch the course by ID or throw a 404 error if not found
        $course = Course::findOrFail($id);
        // Return the view with the course data
        return view('pages.CourseDetail', compact('course'));
    }


    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'description' => 'nullable|string', // Added validation for description
            'topics' => 'nullable|string',      // Added validation for topics
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'views' => 'nullable|integer',      // Changed from string to integer
            'time' => 'nullable|integer',       // Changed from string to integer
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|integer',   // Changed from string to integer
            'lessons' => 'nullable|integer',
            'price' => 'nullable|integer',      // Changed from string to integer
        ]);

        $courseData = $validated;

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($course->thumbnail) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $course->thumbnail));
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $courseData['thumbnail'] = Storage::url($path);
        }

        $course->update($courseData);

        return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course
        ]);
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Course $course)
    {
        // Delete the thumbnail if it exists
        if ($course->thumbnail) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $course->thumbnail));
        }
        
        // Delete the course
        $course->delete();
        
        return response()->json([
            'message' => 'Course deleted successfully'
        ]);
    }
}