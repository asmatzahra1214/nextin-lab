<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    
    <nav class="sidebar fixed top-0 left-0 w-64 bg-gray-50 shadow-lg h-full p-6 z-40" role="navigation" aria-label="Course navigation">
        <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-blue-200 pb-4 mb-6">Courses</h2>
        <ul class="list-none space-y-4">
            <li>
                <a href="# class="no-underline text-gray-700 hover:text-green-600 hover:bg-blue-50 block px-4 py-2 rounded transition-colors duration-200">Web Development</a>
            </li>
            <li>
                <a href=# class="no-underline text-gray-700 hover:text-green-600 hover:bg-blue-50 block px-4 py-2 rounded transition-colors duration-200">Mobile App Development</a>
            </li>
            <li>
                <a href=# class="no-underline text-gray-700 hover:text-green-600 hover:bg-blue-50 block px-4 py-2 rounded transition-colors duration-200">Data Science</a>
            </li>
            <li>
                <a href=# class="no-underline text-gray-700 hover:text-green-600 hover:bg-blue-50 block px-4 py-2 rounded transition-colors duration-200">Cyber Security</a>
            </li>
            <li>
                <a href=# class="no-underline text-gray-700 hover:text-green-600 hover:bg-blue-50 block px-4 py-2 rounded transition-colors duration-200">Graphic Design</a>
            </li>
        </ul>
    </nav>
    <div class="ml-64 p-6">
        <!-- Main content placeholder -->
        <p class="text-gray-600">Main content goes here.</p>
    </div>
</body>
</html>