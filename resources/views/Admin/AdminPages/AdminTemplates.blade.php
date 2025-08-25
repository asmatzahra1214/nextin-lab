@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6 font-poppins">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Admin Templates</h1>
            <a href="{{ route('addedittemplates.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-transform transform hover:scale-105 text-sm">
                <i class="fas fa-plus mr-2"></i> Add New Template
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-green-900 text-white text-sm">
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Framework</th>
                        <th class="p-3 text-left">Likes</th>
                        <th class="p-3 text-left">Downloads</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                    <tr class="hover:bg-gray-100 text-gray-800 text-sm">
                        <td class="p-3 border-b border-gray-200">{{ $template['title'] }}</td>
                        <td class="p-3 border-b border-gray-200">{{ $template['framework'] }}</td>
                        <td class="p-3 border-b border-gray-200">{{ $template['likes'] }}</td>
                        <td class="p-3 border-b border-gray-200">{{ $template['downloads'] }}</td>
                        <td class="p-3 border-b border-gray-200">
                            <span class="bg-{{ $template['status'] == 'active' ? 'green' : 'red' }}-600 text-white px-3 py-1 rounded-full text-xs">{{ ucfirst($template['status']) }}</span>
                        </td>
                        <td class="p-3 border-b border-gray-200">
                            <img src="{{ $template['image_url'] }}" alt="{{ $template['title'] }}" class="w-24 h-14 object-cover rounded">
                        </td>
                        <td class="p-3 border-b border-gray-200 flex space-x-3">
                            <a href="{{ route('addedittemplates.edit', $template['id']) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('viewtemplates.show', $template['id']) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="View"><i class="fas fa-eye"></i></a>
                            <a href="/admin/templates/{{ $template['id'] }}" class="text-red-600 hover:text-red-800 transition-transform transform hover:scale-110" title="Delete" onclick="return confirm('Are you sure you want to delete this template?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
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