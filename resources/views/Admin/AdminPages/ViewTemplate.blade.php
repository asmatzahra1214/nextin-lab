@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 font-poppins">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Template Details</h1>
            <a href="{{ route('admin.templates') }}" class="flex items-center text-gray-600 hover:text-gray-900 text-sm">
                <i class="fas fa-arrow-left mr-1"></i> Back to Templates
            </a>
        </div>

        <div class="space-y-6">
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-image mr-2 text-green-600"></i> Template Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <p class="text-sm text-gray-900">{{ $template->title }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Framework</label>
                        <p class="text-sm text-gray-900">{{ $template->framework }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Likes</label>
                        <p class="text-sm text-gray-900">{{ $template->likes }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Downloads</label>
                        <p class="text-sm text-gray-900">{{ $template->downloads }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <span class="text-sm text-white px-3 py-1 rounded-full {{ $template->status == 'active' ? 'bg-green-600' : 'bg-red-600' }}">
                            {{ ucfirst($template->status) }}
                        </span>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <p class="text-sm text-gray-900">{{ $template->description }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Credits</label>
                        <ul class="list-disc list-inside text-sm text-gray-900">
                            @foreach($template->credits as $credit)
                                <li>{{ $credit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Features</label>
                        <ul class="list-disc list-inside text-sm text-gray-900">
                            @foreach($template->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <img src="{{ $template->image_url }}" alt="Template Image" class="w-48 h-28 object-cover rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Demo URL</label>
                        <a href="{{ $template->demo_url }}" class="text-sm text-green-700 hover:underline" target="_blank">{{ $template->demo_url }}</a>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Details URL</label>
                        <a href="{{ $template->details_url }}" class="text-sm text-green-700 hover:underline" target="_blank">{{ $template->details_url }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
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