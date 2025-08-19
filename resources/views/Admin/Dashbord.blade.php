@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-book-open text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500">Total Courses</h3>
                <p class="text-2xl font-bold">24</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-users text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500">Active Users</h3>
                <p class="text-2xl font-bold">1,234</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500">Monthly Visits</h3>
                <p class="text-2xl font-bold">5,678</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
    <div class="space-y-4">
        <div class="flex items-start border-b pb-4">
            <div class="p-2 rounded-full bg-gray-100 mr-4">
                <i class="fas fa-book text-gray-500"></i>
            </div>
            <div>
                <p class="font-medium">New course added</p>
                <p class="text-gray-500 text-sm">HTML Fundamentals</p>
                <p class="text-gray-400 text-xs mt-1">2 hours ago</p>
            </div>
        </div>
        <!-- More activity items -->
    </div>
</div>
@endsection