@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Create Lecture</h1>
    <form action="{{ route('admin.lessons.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Module</label>
            <select name="module_id" class="w-full border rounded-lg p-2" required>
                <option value="">Select Module</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ old('module_id') == $module->id ? 'selected' : '' }}>
                        {{ $module->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Content</label>
            <textarea name="content" class="w-full border rounded-lg p-2" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Video URL</label>
            <input type="url" name="video_url" value="{{ old('video_url') }}" class="w-full border rounded-lg p-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Order Number</label>
            <input type="number" name="order_number" value="{{ old('order_number') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Create Lecture
        </button>
    </form>
</div>
@endsection
