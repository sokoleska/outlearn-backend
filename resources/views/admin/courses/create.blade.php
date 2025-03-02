@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Create Course</h1>
    <form action="{{ route('admin.courses.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border rounded-lg p-2" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Professor</label>
            <select name="instructor_id" class="w-full border rounded-lg p-2" required>
                <option value="">Select Professor</option>
                {{-- @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('instructor_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach --}}
                <option value="6">Professor 1</option>
                <option value="7">Professor 2</option>
                <option value="8">Professor 3</option>

            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Category</label>
            <select name="category_id" class="w-full border rounded-lg p-2" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Create Course
        </button>
    </form>
</div>
@endsection
