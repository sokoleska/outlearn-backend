@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="flex items-center gap-6">
            <!-- Profile Image -->
            <img src="{{ $professor->user->profile_picture ?? asset('images/personPlaceholder.jpg') }}" class="w-24 h-24 rounded-full border border-gray-400">
            
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ optional($professor->user)->name ?? 'No Name Available' }}</h2>
                <p class="text-gray-600">{{ $professor->position ?? 'Position Not Provided' }}</p>
            </div>
        </div>

        <div class="mt-6">
            <p><strong>Company:</strong> {{ $professor->company ?? 'N/A' }}</p>
            <p><strong>Experience:</strong> {{ $professor->experience ?? 'N/A' }} years</p>
        </div>

        <div class="mt-6 flex gap-4">
            <!-- Back Button -->
            <a href="{{ route('admin.professors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                Back
            </a>
            <!-- Edit Button -->
            <a href="{{ route('admin.professors.edit', $professor->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Edit
            </a>
            <!-- Delete Button -->
            <form action="{{ route('admin.professors.destroy', $professor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this professor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
