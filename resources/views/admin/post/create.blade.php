@extends('layouts.admin')

@section('content')
<div class="container mt-11">
    <div class="card p-4">
        <h3 class="mb-3">Create Post</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <!-- Category -->
                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Title -->
                <div class="col-md-6 mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Description -->
                <div class="col-md-6 mb-3">
                    <label>Short Description</label>
                    <textarea name="description" class="form-control" rows="2">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Content -->
                <div class="col-12 mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Media type -->
                <div class="col-md-6 mb-3">
                    <label>Media Type</label>
                    <select name="media_type" class="form-select" id="media_type">
                        <option value="image">Image</option>
                        <option value="video">YouTube Video</option>
                    </select>
                    @error('media_type') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Image file -->
                <div class="col-md-6 mb-3" id="image_input">
                    <label>Upload Image</label>
                    <input type="file" name="media_file" class="form-control">
                    @error('media_file') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Video URL -->
                <div class="col-md-6 mb-3 d-none" id="video_input">
                    <label>YouTube URL</label>
                    <input type="text" name="video_url" class="form-control" value="{{ old('video_url') }}">
                    @error('video_url') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-success">Create Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection