<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('Components.Navbar');
// });

// Route::get('/', function () {
//     return view('Components.Sidebar');
// });
// Route::get('/', function () {
//     return view('Components.Topbar');
// });
// Route::get('/', function () {
//     return view('Components.Footer');

// });
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