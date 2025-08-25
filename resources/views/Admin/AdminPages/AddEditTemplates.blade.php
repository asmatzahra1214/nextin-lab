@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 font-poppins">
        <h1 class="text-xl font-semibold text-gray-800 mb-6">{{ $template->id ? 'Edit Template' : 'Add New Template' }}</h1>
        
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @if($template->id)
                <input type="hidden" name="id" value="{{ $template->id }}">
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{ $template->title }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                </div>
                
                <div class="mb-4">
                    <label for="framework" class="block text-gray-700 text-sm font-medium">Framework</label>
                    <select name="framework" id="framework" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                        <option value="Bootstrap" {{ $template->framework == 'Bootstrap' ? 'selected' : '' }}>Bootstrap</option>
                        <option value="Tailwind CSS" {{ $template->framework == 'Tailwind CSS' ? 'selected' : '' }}>Tailwind CSS</option>
                        <option value="Foundation" {{ $template->framework == 'Foundation' ? 'selected' : '' }}>Foundation</option>
                        <option value="Bulma" {{ $template->framework == 'Bulma' ? 'selected' : '' }}>Bulma</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="likes" class="block text-gray-700 text-sm font-medium">Likes</label>
                    <input type="number" name="likes" id="likes" value="{{ $template->likes }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                </div>
                
                <div class="mb-4">
                    <label for="downloads" class="block text-gray-700 text-sm font-medium">Downloads</label>
                    <input type="number" name="downloads" id="downloads" value="{{ $template->downloads }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                </div>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-medium">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                    <option value="active" {{ $template->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $template->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-medium">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>{{ $template->description }}</textarea>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium">Credits</label>
                <div id="credits-container">
                    @if(count($template->credits) > 0)
                        @foreach($template->credits as $index => $credit)
                            <div class="credit-field flex items-center mb-2">
                                <input type="text" name="credits[]" value="{{ $credit }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Credit">
                                @if($index > 0)
                                    <button type="button" class="remove-credit ml-2 text-red-600 hover:text-red-800">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="credit-field flex items-center mb-2">
                            <input type="text" name="credits[]" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Credit">
                        </div>
                    @endif
                </div>
                <button type="button" id="add-credit" class="mt-2 bg-green-600 text-white px-3 py-1 rounded-lg text-sm">
                    <i class="fas fa-plus mr-1"></i> Add Credit
                </button>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium">Template Features</label>
                <div id="features-container">
                    @if(count($template->features) > 0)
                        @foreach($template->features as $index => $feature)
                            <div class="feature-field flex items-center mb-2">
                                <input type="text" name="features[]" value="{{ $feature }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Feature">
                                @if($index > 0)
                                    <button type="button" class="remove-feature ml-2 text-red-600 hover:text-red-800">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="feature-field flex items-center mb-2">
                            <input type="text" name="features[]" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Feature">
                        </div>
                    @endif
                </div>
                <button type="button" id="add-feature" class="mt-2 bg-green-600 text-white px-3 py-1 rounded-lg text-sm">
                    <i class="fas fa-plus mr-1"></i> Add Feature
                </button>
            </div>
            
            <!-- Image Upload/URL Section -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Template Image</label>
                <div class="flex flex-col space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="image_url_option" name="image_option" value="url" class="mr-2" checked>
                        <label for="image_url_option" class="text-sm">Use URL</label>
                    </div>
                    <input type="url" name="image_url" id="image_url" value="{{ $template->image_url }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 image-input" placeholder="Image URL">
                    
                    <div class="flex items-center mt-2">
                        <input type="radio" id="image_upload_option" name="image_option" value="upload" class="mr-2">
                        <label for="image_upload_option" class="text-sm">Upload Image</label>
                    </div>
                    <input type="file" name="image_file" id="image_file" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 image-input hidden" accept="image/*">
                </div>
            </div>
            
            <!-- Demo Upload/URL Section -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Demo</label>
                <div class="flex flex-col space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="demo_url_option" name="demo_option" value="url" class="mr-2" checked>
                        <label for="demo_url_option" class="text-sm">Use URL</label>
                    </div>
                    <input type="url" name="demo_url" id="demo_url" value="{{ $template->demo_url }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 demo-input" placeholder="Demo URL">
                    
                    <div class="flex items-center mt-2">
                        <input type="radio" id="demo_upload_option" name="demo_option" value="upload" class="mr-2">
                        <label for="demo_upload_option" class="text-sm">Upload File</label>
                    </div>
                    <input type="file" name="demo_file" id="demo_file" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 demo-input hidden" accept=".zip,.rar,.7zip">
                    <p class="text-xs text-gray-500">Accepted formats: ZIP, RAR, 7ZIP</p>
                </div>
            </div>
            
            <!-- Details Upload/URL Section -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Details</label>
                <div class="flex flex-col space-y-2">
                    <div class="flex items-center">
                        <input type="radio" id="details_url_option" name="details_option" value="url" class="mr-2" checked>
                        <label for="details_url_option" class="text-sm">Use URL</label>
                    </div>
                    <input type="url" name="details_url" id="details_url" value="{{ $template->details_url }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 details-input" placeholder="Details URL">
                    
                    <div class="flex items-center mt-2">
                        <input type="radio" id="details_upload_option" name="details_option" value="upload" class="mr-2">
                        <label for="details_upload_option" class="text-sm">Upload File</label>
                    </div>
                    <input type="file" name="details_file" id="details_file" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700 details-input hidden" accept=".pdf,.doc,.docx,.txt">
                    <p class="text-xs text-gray-500">Accepted formats: PDF, DOC, DOCX, TXT</p>
                </div>
            </div>
            
            <div class="flex space-x-3">
                <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-transform transform hover:scale-105 text-sm">
                    {{ $template->id ? 'Update Template' : 'Save Template' }}
                </button>
                <a href="{{ route('admin.templates') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-transform transform hover:scale-105 text-sm">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add credit field
            document.getElementById('add-credit').addEventListener('click', function() {
                const container = document.getElementById('credits-container');
                const newField = document.createElement('div');
                newField.className = 'credit-field flex items-center mb-2';
                newField.innerHTML = `
                    <input type="text" name="credits[]" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Credit">
                    <button type="button" class="remove-credit ml-2 text-red-600 hover:text-red-800">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                container.appendChild(newField);
                
                // Add event listener to remove button
                newField.querySelector('.remove-credit').addEventListener('click', function() {
                    container.removeChild(newField);
                });
            });
            
            // Add feature field
            document.getElementById('add-feature').addEventListener('click', function() {
                const container = document.getElementById('features-container');
                const newField = document.createElement('div');
                newField.className = 'feature-field flex items-center mb-2';
                newField.innerHTML = `
                    <input type="text" name="features[]" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Feature">
                    <button type="button" class="remove-feature ml-2 text-red-600 hover:text-red-800">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                container.appendChild(newField);
                
                // Add event listener to remove button
                newField.querySelector('.remove-feature').addEventListener('click', function() {
                    container.removeChild(newField);
                });
            });
            
            // Add event listeners to existing remove buttons
            document.querySelectorAll('.remove-credit').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.credit-field').remove();
                });
            });
            
            document.querySelectorAll('.remove-feature').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.feature-field').remove();
                });
            });
            
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
            
            // Toggle between URL and file upload for demo
            document.getElementById('demo_url_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('demo_url').classList.remove('hidden');
                    document.getElementById('demo_file').classList.add('hidden');
                    document.getElementById('demo_url').required = true;
                    document.getElementById('demo_file').required = false;
                }
            });
            
            document.getElementById('demo_upload_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('demo_url').classList.add('hidden');
                    document.getElementById('demo_file').classList.remove('hidden');
                    document.getElementById('demo_url').required = false;
                    document.getElementById('demo_file').required = true;
                }
            });
            
            // Toggle between URL and file upload for details
            document.getElementById('details_url_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('details_url').classList.remove('hidden');
                    document.getElementById('details_file').classList.add('hidden');
                    document.getElementById('details_url').required = true;
                    document.getElementById('details_file').required = false;
                }
            });
            
            document.getElementById('details_upload_option').addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('details_url').classList.add('hidden');
                    document.getElementById('details_file').classList.remove('hidden');
                    document.getElementById('details_url').required = false;
                    document.getElementById('details_file').required = true;
                }
            });
        });
    </script>

    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        
        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .bg-white.rounded-lg {
                padding: 1rem;
            }

            .text-xl.font-semibold {
                font-size: 1.25rem;
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