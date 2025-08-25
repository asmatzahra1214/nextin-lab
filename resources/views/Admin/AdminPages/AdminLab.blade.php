@extends('layouts.admin')

@section('content')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
        .table-header {
            background: linear-gradient(to right, #0f5132, #0a3622);
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
        <main class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-semibold text-gray-800">Code Lab Items</h1>
                    <a href="{{ route('addeditlab.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition-transform transform hover:scale-105 text-sm">
                        <i class="fas fa-plus mr-2"></i> Add New Item
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="table-header text-white text-sm">
                                <th class="p-3 text-left">Title</th>
                                <th class="p-3 text-left">Likes</th>
                                <th class="p-3 text-left">Comments</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-left">Image</th>
                                <th class="p-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($labs as $lab)
                            <tr class="hover:bg-gray-100 text-gray-800 text-sm">
                                <td class="p-3 border-b border-gray-200">{{ $lab['title'] }}</td>
                                <td class="p-3 border-b border-gray-200">{{ $lab['likes'] }}</td>
                                <td class="p-3 border-b border-gray-200">{{ $lab['comments'] }}</td>
                                <td class="p-3 border-b border-gray-200">
                                    <span class="text-white px-3 py-1 rounded-full text-xs {{ $lab['status'] == 'active' ? 'status-active' : 'status-inactive' }}">{{ ucfirst($lab['status']) }}</span>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <img src="{{ $lab['image_url'] }}" alt="{{ $lab['title'] }}" class="w-24 h-14 object-cover rounded">
                                </td>
                                <td class="p-3 border-b border-gray-200 flex space-x-3">
                                    <a href="{{ route('addeditlab.edit', $lab['id']) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('viewlab.show', $lab['id']) }}" class="text-green-700 hover:text-green-900 transition-transform transform hover:scale-110" title="View"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('addeditlab.delete', $lab['id']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-transform transform hover:scale-110" title="Delete" onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>


@endsection