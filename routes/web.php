<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; // Add this line to import the CourseController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/projects', function () {
    return view('pages.projects');
});

Route::get('/templates', function () {
    return view('pages.templates');
});

Route::get('/lab', function () {
    return view('pages.lab');
});

//This route is duplicated below and can be removed
Route::get('/courses', function () {
    return view('pages.courses');
});

Route::get('/coursedetail/{id}', function ($id) {
    return view('pages.coursedetail', ['id' => $id]);
})->name('pages.coursedetail');

Route::get('/coursecontent', function () {
    return view('pages.coursecontent');
});

// Course detail page
Route::get('/courses/{id}', function ($id) {
    $course = [
        'id' => $id,
        'title' => 'HTML & CSS Fundamentals',
        'description' => 'Learn the building blocks of web development...',
        'instructor' => 'Sarah Johnson',
        'duration' => '6 hours',
        'lessons' => 5,
        'level' => 'beginner',
        'price' => 'Free',
        'thumbnail' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=800&q=80/400x450',
        'topics' => [
            ['id' => 1, 'title' => 'Introduction to HTML', 'duration' => '45 min'],
            ['id' => 2, 'title' => 'CSS Fundamentals', 'duration' => '1 hour'],
            ['id' => 3, 'title' => 'JavaScript Basics', 'duration' => '1.5 hours'],
            ['id' => 4, 'title' => 'Responsive Design', 'duration' => '1 hour'],
            ['id' => 5, 'title' => 'Project: Build a Portfolio', 'duration' => '2 hours']
        ]
    ];
    return view('pages.coursedetail', ['course' => $course]);
})->name('courses.detail');

// Course content page
Route::get('/courses/{courseId}/content/{topicId}', function ($courseId, $topicId) {
    // Fetch topic content from database
    return view('pages.coursecontent', [
        'courseId' => $courseId,
        'topicId' => $topicId
    ]);
})->name('course.content');

//Admin routes
Route::prefix('admin')->group(function() {
    // Dashboard
    Route::view('/', 'admin.dashbord'); // Fixed typo in 'dashboard'
    
    // Courses
   Route::get('/admincourses', [CourseController::class, 'showAdminCourses'])->name('admin.courses');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    
 
});

