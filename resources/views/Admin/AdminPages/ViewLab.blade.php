@extends('layouts.admin')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
        .status-active {
            background-color: #10b981;
        }
        .status-inactive {
            background-color: #ef4444;
        }
    </style>
</head>
<body>
 

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-semibold text-gray-800">Lab Item Details</h1>
                    <a href="{{ route('admin.lab') }}" class="flex items-center text-gray-600 hover:text-gray-900 text-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Code Lab
                    </a>
                </div>

                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-image mr-2 text-green-600"></i> Lab Item Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <p class="text-sm text-gray-900">{{ $lab->title }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Likes</label>
                                <p class="text-sm text-gray-900">{{ $lab->likes }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Comments</label>
                                <p class="text-sm text-gray-900">{{ $lab->comments }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <span class="text-sm text-white px-3 py-1 rounded-full {{ $lab->status == 'active' ? 'status-active' : 'status-inactive' }}">
                                    {{ ucfirst($lab->status) }}
                                </span>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <p class="text-sm text-gray-900">{{ $lab->description }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                                <img src="{{ $lab->image_url }}" alt="Lab Item Image" class="w-48 h-28 object-cover rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection