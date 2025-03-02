@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Create User</h1>
    <form action="{{ route('admin.professors.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2 @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg p-2 @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Position</label>
            <input type="text" name="position" value="{{ old('position') }}" class="w-full border rounded-lg p-2 @error('position') border-red-500 @enderror" required>
            @error('position')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" class="w-full border rounded-lg p-2 @error('company') border-red-500 @enderror">
            @error('company')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gender</label>
            <select name="gender" class="w-full border rounded-lg p-2 @error('gender') border-red-500 @enderror">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Work Experience (Years)</label>
            <input type="number" name="work_experience_years" value="{{ old('work_experience_years') }}" class="w-full border rounded-lg p-2 @error('work_experience_years') border-red-500 @enderror" min="0" max="60">
            @error('work_experience_years')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.professors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                Cancel
            </a>
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Create User
            </button>
        </div>
    </form>
</div>
@endsection
