@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Create Module</h1>
    <form action="{{ route('admin.modules.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Course</label>
            <select name="course_id" class="w-full border rounded-lg p-2" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Module Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Content</label>
            <textarea name="content" class="w-full border rounded-lg p-2" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Create Module
        </button>
    </form>
</div>
@endsection
