@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Lecture</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.lessons.update', $lecture->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $lecture->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Content</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ old('content', $lecture->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Video URL</label>
                    <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $lecture->video_url) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Order Number</label>
                    <input type="number" name="order_number" class="form-control" value="{{ old('order_number', $lecture->order_number) }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.lectures.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">Update Lecture</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
