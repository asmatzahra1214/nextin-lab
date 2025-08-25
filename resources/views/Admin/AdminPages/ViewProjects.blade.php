@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 font-poppins">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Project Details</h1>
            <a href="{{ route('admin.projects') }}" class="flex items-center text-gray-600 hover:text-gray-900 text-sm">
                <i class="fas fa-arrow-left mr-1"></i> Back to Projects
            </a>
        </div>

        <div class="space-y-6">
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-image mr-2 text-green-600"></i> Project Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <p class="text-sm text-gray-900">{{ $project->title }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Technology</label>
                        <p class="text-sm text-gray-900">{{ $project->technology }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <p class="text-sm text-gray-900">{{ $project->price }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <span class="text-sm text-white px-3 py-1 rounded-full {{ $project->status == 'active' ? 'bg-green-600' : 'bg-red-600' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <p class="text-sm text-gray-900">{{ $project->short_description }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                        <p class="text-sm text-gray-900">{{ $project->full_description }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Downloads</label>
                        <p class="text-sm text-gray-900">{{ $project->downloads }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Purchases</label>
                        <p class="text-sm text-gray-900">{{ $project->purchases }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <img src="{{ $project->image_url }}" alt="Project Image" class="w-48 h-28 object-cover rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection