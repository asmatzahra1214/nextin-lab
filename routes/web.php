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



// Course detail page


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
    
    //Admin Courses
    //Route::get('/admincourses', [CourseController::class, 'showAdminCourses'])->name('admin.courses');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');
    Route::get('/course', [CourseController::class, 'showAdminCourses'])->name('admin.course');
    Route::delete('/course/{course}', [CourseController::class, 'destroy'])->name('admin.deletecourse');
    
    Route::put('/course/{id}', [CourseController::class, 'update'])->name('admin.updatecourse');


Route::get('/coursedetail/{id}', [CourseController::class, 'show'])->name('courses.detail');

Route::get('/coursedetail/{id}/{topic}', [CourseController::class, 'topicContent'])->name('topic.detail');
 
});

