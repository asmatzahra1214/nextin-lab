<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Sample project data
    private $projects = [
        1 => [
            'id' => 1,
            'title' => 'Student App : NodeJS ExpressJS & MongoDB CRUD API Project',
            'short_description' => 'The Students CRUD App is a web-based application...',
            'full_description' => 'The Students CRUD App is a web-based application that allows you to manage student records with Create, Read, Update, and Delete operations. Built with Node.js, Express.js, and MongoDB.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/student-app-:-nodejs-expressjs-&-mongodb-crud-api-project.png',
            'technology' => 'NodeJS',
            'price' => 'Free',
            'downloads' => 273,
            'purchases' => 0
        ],
        2 => [
            'id' => 2,
            'title' => 'Contact App : NodeJS ExpressJS & MongoDB CRUD Project',
            'short_description' => 'In this new project you will get the code of complete nodejs, expressjs and mon...',
            'full_description' => 'A complete contact management application built with Node.js, Express.js, and MongoDB. Features include adding, editing, deleting, and searching contacts with a user-friendly interface.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/contact-app-:-nodejs-expressjs-&-mongodb-crud-project.png',
            'technology' => 'NodeJS',
            'price' => 'Free',
            'downloads' => 413,
            'purchases' => 0
        ],
        3 => [
            'id' => 3,
            'title' => 'Contact App HTML Template',
            'short_description' => 'Responsive contact form with validation for websites.',
            'full_description' => 'A responsive HTML contact form template with client-side validation. Easily customizable and integrates with any website. Includes fields for name, email, subject, and message.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/contact-app-html-template.png',
            'technology' => 'HTML',
            'price' => 'Free',
            'downloads' => 672,
            'purchases' => 0
        ],
        4 => [
            'id' => 4,
            'title' => 'News Blog Project in NodeJS, ExpressJS & MongoDB',
            'short_description' => 'Manage news articles with categories and tags using NodeJS.',
            'full_description' => 'A complete news blog system with admin panel for managing articles, categories, and tags. Built with Node.js, Express.js, and MongoDB. Features include user authentication, comments, and search functionality.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/news-blog-project-in-nodejs,-expressjs-&-mongodb.png',
            'technology' => 'NodeJS',
            'price' => 'Free',
            'downloads' => 553,
            'purchases' => 0
        ],
        5 => [
            'id' => 5,
            'title' => 'School Management Project in Laravel',
            'short_description' => 'Automates school operations like student management and grading.',
            'full_description' => 'A comprehensive school management system built with Laravel. Features include student registration, attendance tracking, grade management, timetable scheduling, and reporting. Admin, teacher, and student portals.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/school-management-project-in-laravel.jpg',
            'technology' => 'LaravelPHP',
            'price' => '₹350',
            'downloads' => 0,
            'purchases' => 223
        ],
        6 => [
            'id' => 6,
            'title' => 'Digital Products Selling Project in Laravel',
            'short_description' => 'Multi-vendor platform for selling digital products with payment integration.',
            'full_description' => 'An e-commerce platform specifically designed for digital products. Supports multiple vendors, secure payment integration, digital download management, and license key generation. Built with Laravel.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/digital-products-selling-project-in-laravel.jpg',
            'technology' => 'LaravelPHP',
            'price' => '₹250',
            'downloads' => 0,
            'purchases' => 190
        ],
        7 => [
            'id' => 7,
            'title' => 'Tourism Management Project in Laravel',
            'short_description' => 'Manages tours, bookings, and customer relationships for tourism businesses.',
            'full_description' => 'A complete tourism management system for travel agencies. Features include tour package management, booking system, customer relationship management, payment processing, and reporting. Built with Laravel.',
            'status' => 'active',
            'image_url' => 'https://www.yahubaba.com/public/projects/tourism-management-project-in-laravel.png',
            'technology' => 'LaravelPHP',
            'price' => '₹250',
            'downloads' => 0,
            'purchases' => 195
        ],
        8 => [
            'id' => 8,
            'title' => 'Resume Management Project in Laravel',
            'short_description' => 'Create professional resumes with personal and professional details.',
            'full_description' => 'A resume builder application that helps users create professional resumes. Includes templates, sections for personal information, education, work experience, skills, and projects. Export to PDF functionality.',
            'status' => 'inactive',
            'image_url' => 'https://www.yahubaba.com/public/projects/resume-management-project-in-laravel.jpg',
            'technology' => 'LaravelPHP',
            'price' => '₹250',
            'downloads' => 0,
            'purchases' => 159
        ],
        9 => [
            'id' => 9,
            'title' => 'Beauty Salon Project in Laravel',
            'short_description' => 'Manages appointments, staff, and services for beauty salons.',
            'full_description' => 'A management system for beauty salons and spas. Features include appointment scheduling, staff management, service catalog, customer database, and payment processing. Built with Laravel.',
            'status' => 'inactive',
            'image_url' => 'https://www.yahubaba.com/public/projects/beauty-salon-project-in-laravel.png',
            'technology' => 'LaravelPHP',
            'price' => '₹250',
            'downloads' => 0,
            'purchases' => 213
        ],
        10 => [
            'id' => 10,
            'title' => 'Ecommerce Project in Laravel & Inertia Js',
            'short_description' => 'E-commerce platform with Inertia.js and React for seamless shopping.',
            'full_description' => 'A modern e-commerce platform built with Laravel and Inertia.js. Features include product catalog, shopping cart, user authentication, order management, payment gateway integration, and admin panel. Uses React for the frontend.',
            'status' => 'inactive',
            'image_url' => 'https://www.yahubaba.com/public/projects/ecommerce-project-in-laravel-&-inertia-js.png',
            'technology' => 'React Js LaravelPHP',
            'price' => '₹300',
            'downloads' => 0,
            'purchases' => 150
        ]
    ];

    public function index()
    {
        $projects = $this->projects;
        return view('admin.adminpages.adminprojects', compact('projects'));
    }

    public function create()
    {
        // Empty project for create form with all required properties
        $project = (object)[
            'id' => null,
            'title' => '',
            'short_description' => '',
            'full_description' => '',
            'status' => 'active',
            'image_url' => '',
            'technology' => '',
            'price' => '',
            'downloads' => 0,
            'purchases' => 0
        ];
        
        return view('admin.adminpages.addeditprojects', compact('project'));
    }

    public function edit($id)
    {
        if (array_key_exists($id, $this->projects)) {
            $project = (object)$this->projects[$id];
            return view('admin.adminpages.addeditprojects', compact('project'));
        }
        
        abort(404, 'Project not found');
    }

    public function show($id)
    {
        if (array_key_exists($id, $this->projects)) {
            $project = (object)$this->projects[$id];
            return view('admin.adminpages.viewprojects', compact('project'));
        }
        
        abort(404, 'Project not found');
    }
}