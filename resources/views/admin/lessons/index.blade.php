@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.lessons.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Add New Lesson
            </a>

            <!-- Search Form -->
            <form action="#" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search lessons..." 
                    value="{{ request('search') }}"
                    class="px-4 py-2 border border-gray-400 rounded-lg focus:ring focus:ring-blue-300"
                >
                <button type="submit" class="ml-2 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Search
                </button>
            </form>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-4">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-white uppercase tracking-wider text-sm">
                        <th class="py-3 px-4 border border-gray-500">ID</th>
                        <th class="py-3 px-4 border border-gray-500">Title</th>
                        <th class="py-3 px-4 border border-gray-500">Course</th>
                        <th class="py-3 px-4 border border-gray-500">Duration</th>
                        <th class="py-3 px-4 border border-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition duration-200">
                        <td class="py-3 px-4 border border-gray-400 text-center">{{ $lesson->id }}</td>
                        <td class="py-3 px-4 border border-gray-400">{{ $lesson->title }}</td>
                        <td class="py-3 px-4 border border-gray-400">
                            {{ $lesson->course->title ?? 'Unassigned' }}
                        </td>
                        <td class="py-3 px-4 border border-gray-400 text-center">
                            {{ $lesson->duration ? $lesson->duration . ' mins' : 'N/A' }}
                        </td>
                        <td class="py-3 px-4 border border-gray-400 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-700 transition duration-300">
                                    Edit
                                </a>
                                <a href="{{ route('admin.lessons.show', $lesson->id) }}" class="px-3 py-1 bg-green-500 text-white rounded shadow hover:bg-green-700 transition duration-300">
                                    Show
                                </a>
                                <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-700 transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">No lessons found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>  
@endsection  
