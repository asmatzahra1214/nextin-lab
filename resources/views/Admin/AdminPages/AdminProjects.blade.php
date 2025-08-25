@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 font-poppins">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Admin Projects</h1>
            <a href="{{ route('addeditprojects.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-transform transform hover:scale-105 text-sm">
                <i class="fas fa-plus mr-2"></i> Add New Project
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-green-900 text-white text-sm">
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Project 1 -->
                    <tr class="hover:bg-gray-100 text-gray-800 text-sm">
                        <td class="p-3 border-b border-gray-200">Student App : NodeJS ExpressJS & MongoDB CRUD API Project</td>
                        <td class="p-3 border-b border-gray-200">The Students CRUD App is a web-based application...</td>
                        <td class="p-3 border-b border-gray-200">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">Active</span>
                        </td>
                        <td class="p-3 border-b border-gray-200">
                            <img src="https://www.yahubaba.com/public/projects/student-app-:-nodejs-expressjs-&-mongodb-crud-api-project.png" alt="Student App" class="w-24 h-14 object-cover rounded">
                        </td>
                        <td class="p-3 border-b border-gray-200 flex space-x-3">
                            <a href="{{ route('addeditprojects.edit', 1) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('viewprojects.show', 1) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="View"><i class="fas fa-eye"></i></a>
                            <a href="/admin/projects/1" class="text-red-600 hover:text-red-800 transition-transform transform hover:scale-110" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Project 2 -->
                    <tr class="hover:bg-gray-100 text-gray-800 text-sm">
                        <td class="p-3 border-b border-gray-200">Contact App : NodeJS ExpressJS & MongoDB CRUD Project</td>
                        <td class="p-3 border-b border-gray-200">In this new project you will get the code of complete nodejs, expressjs and mon...</td>
                        <td class="p-3 border-b border-gray-200">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">Active</span>
                        </td>
                        <td class="p-3 border-b border-gray-200">
                            <img src="https://www.yahubaba.com/public/projects/contact-app-:-nodejs-expressjs-&-mongodb-crud-project.png" alt="Contact App" class="w-24 h-14 object-cover rounded">
                        </td>
                        <td class="p-3 border-b border-gray-200 flex space-x-3">
                            <a href="{{ route('addeditprojects.edit', 2) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('viewprojects.show', 2) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="View"><i class="fas fa-eye"></i></a>
                            <a href="/admin/projects/2" class="text-red-600 hover:text-red-800 transition-transform transform hover:scale-110" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Project 3 -->
                    <tr class="hover:bg-gray-100 text-gray-800 text-sm">
                        <td class="p-3 border-b border-gray-200">Contact App HTML Template</td>
                        <td class="p-3 border-b border-gray-200">Responsive contact form with validation for websites.</td>
                        <td class="p-3 border-b border-gray-200">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">Active</span>
                        </td>
                        <td class="p-3 border-b border-gray-200">
                            <img src="https://www.yahubaba.com/public/projects/contact-app-html-template.png" alt="Contact App HTML Template" class="w-24 h-14 object-cover rounded">
                        </td>
                        <td class="p-3 border-b border-gray-200 flex space-x-3">
                            <a href="{{ route('addeditprojects.edit', 3) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('viewprojects.show', 3) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="View"><i class="fas fa-eye"></i></a>
                            <a href="/admin/projects/3" class="text-red-600 hover:text-red-800 transition-transform transform hover:scale-110" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Project 4 to 10 would follow the same pattern -->
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        @media (max-width: 768px) {
            .content-area {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }

            .bg-white.rounded-lg {
                padding: 1rem;
            }

            .text-xl.font-semibold {
                font-size: 1.25rem;
            }

            .bg-green-700.text-white {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }

            .w-full.border-collapse {
                font-size: 0.875rem;
            }

            .w-full.border-collapse th,
            .w-full.border-collapse td {
                padding: 0.75rem;
            }

            .w-24.h-14 {
                width: 5rem;
                height: 3rem;
            }

            .text-sm {
                font-size: 0.75rem;
            }

            .text-xs {
                font-size: 0.65rem;
            }
        }
    </style>
@endsection