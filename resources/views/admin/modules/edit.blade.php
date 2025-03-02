@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Edit Module</h1>

    <form action="{{ route('admin.modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Course</label>
            <select name="course_id" class="w-full border rounded-lg p-2">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $module->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Module Title</label>
            <input type="text" name="title" value="{{ old('title', $module->title) }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Content</label>
            <textarea name="content" class="w-full border rounded-lg p-2">{{ old('content', $module->content) }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.modules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 me-2">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Update Module
            </button>
        </div>
    </form>
</div>
@endsection
