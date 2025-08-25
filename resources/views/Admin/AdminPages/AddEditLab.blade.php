@extends('layouts.admin')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body>
  

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-xl font-semibold text-gray-800 mb-6">{{ $lab->id ? 'Edit Lab Item' : 'Add New Lab Item' }}</h1>
                
                <form action="{{ $lab->id ? route('addeditlab.update', $lab->id) : route('addeditlab.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($lab->id)
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $lab->id }}">
                    @endif
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-medium mb-1">Title</label>
                        <input type="text" name="title" id="title" value="{{ $lab->title }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="likes" class="block text-gray-700 text-sm font-medium mb-1">Likes</label>
                            <input type="number" name="likes" id="likes" value="{{ $lab->likes }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="comments" class="block text-gray-700 text-sm font-medium mb-1">Comments</label>
                            <input type="number" name="comments" id="comments" value="{{ $lab->comments }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-medium mb-1">Status</label>
                        <select name="status" id="status" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                            <option value="active" {{ $lab->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $lab->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Description</label>
                        <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>{{ $lab->description }}</textarea>
                    </div>
                    
                    <!-- Image Upload/URL Section -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Image</label>
                        <div class="flex flex-col space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="image_url_option" name="image_option" value="url" class="mr-2" checked>
                                <label for="image_url_option" class="text-sm">Use URL</label>
                            </div>
                            <input type="url" name="image_url" id="image_url" value="{{ $lab->image_url }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 image-input" placeholder="Image URL">
                            
                            <div class="flex items-center mt-2">
                                <input type="radio" id="image_upload_option" name="image_option" value="upload" class="mr-2">
                                <label for="image_upload_option" class="text-sm">Upload Image</label>
                            </div>
                            <input type="file" name="image_file" id="image_file" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 image-input hidden" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="flex space-x-3">
                        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-transform transform hover:scale-105 text-sm">
                            {{ $lab->id ? 'Update Item' : 'Save Item' }}
                        </button>
                        <a href="{{ route('admin.lab') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-105 text-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle between URL and file upload for image
            document.getElementById('image_url_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('image_url').classList.remove('hidden');
                    document.getElementById('image_file').classList.add('hidden');
                    document.getElementById('image_url').required = true;
                    document.getElementById('image_file').required = false;
                }
            });
            
            document.getElementById('image_upload_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('image_url').classList.add('hidden');
                    document.getElementById('image_file').classList.remove('hidden');
                    document.getElementById('image_url').required = false;
                    document.getElementById('image_file').required = true;
                }
            });
        });
    </script>
@endsection