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

    public function showAdminCourses()
    {
        return view('admin.adminpages.admincourses');
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
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'views' => 'nullable|string|max:50',
            'time' => 'nullable|string|max:50',
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|string|max:50',
            'lessons' => 'nullable|integer',
            'price' => 'nullable|string|max:50',
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
    public function show(Course $course)
    {
        return response()->json($course);
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'views' => 'nullable|string|max:50',
            'time' => 'nullable|string|max:50',
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'duration' => 'nullable|string|max:50',
            'lessons' => 'nullable|integer',
            'price' => 'nullable|string|max:50',
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
        if ($course->thumbnail) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $course->thumbnail));
        }
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
