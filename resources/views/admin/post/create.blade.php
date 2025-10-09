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

                <!-- Categories + Subcategories -->
                <div class="col-12 mb-3">
                    <label>Categories & Subcategories</label>
                    <div id="category-wrapper">
                        @foreach(old('categories', []) as $index => $cat)
                            <div class="row mb-2 category-row">
                                <div class="col-md-5">
                                    <select name="categories[{{ $index }}][id]" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($cat['id'] ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="categories[{{ $index }}][subcategories][]" class="form-select" multiple>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" 
                                                @if(isset($cat['subcategories']) && in_array($subcategory->id, $cat['subcategories'])) selected @endif>
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-category">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary" id="add-category">Add Category</button>
                </div>

                <!-- Title -->
                <div class="col-md-6 mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                           value="{{ old('slug') }}">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Tags -->
                <div class="col-6 mb-3">
                    <label>Tags (separate with commas)</label>
                    <input type="text" 
                        name="tags" 
                        class="form-control @error('tags') is-invalid @enderror"
                        value="{{ old('tags') }}"
                        placeholder="e.g. football, champions league, real madrid">
                    @error('tags') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Short Description -->
                <div class="col-md-6 mb-3">
                    <label>Short Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="2">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Content -->
              {{--   <div class="col-12 mb-3">
                    <label for="content" class="form-label">المحتوى</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div> --}}

                @include('components.forms.tinymce-editor')

                <!-- Media -->
                <div class="col-12 mb-3">
                    <label>Main Media</label>
                    <select name="media[0][type]" id="media_type" class="form-select mb-2">
                        <option value="image" {{ old('media.0.type') == 'image' ? 'selected' : '' }}>Image</option>
                        <option value="videotube" {{ old('media.0.type') == 'videotube' ? 'selected' : '' }}>YouTube Video</option>
                        <option value="aivideo" {{ old('media.0.type') == 'aivideo' ? 'selected' : '' }}>AI YouTube Video</option>
                    </select>

                    <!-- Image input -->
                    <div id="image_input">
                        <input type="file" name="media[0][path]" class="form-control">
                    </div>

                    <!-- Video input -->
                    <div class="d-none" id="video_input">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <input type="text" name="media[0][path]" class="form-control"
                                       placeholder="https://www.youtube.com/embed/...">
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="media[0][thumbnail]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="col-12">
                    <button class="btn btn-success">Create Post</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- TinyMCE -->







<script>
document.addEventListener("DOMContentLoaded", function () {
    // Media toggle
    const mediaSelect = document.getElementById("media_type");
    const imageInput = document.getElementById("image_input");
    const videoInput = document.getElementById("video_input");

    function toggleInputs() {
        if (mediaSelect.value === "image") {
            imageInput.classList.remove("d-none");
            videoInput.classList.add("d-none");
        } else {
            videoInput.classList.remove("d-none");
            imageInput.classList.add("d-none");
        }
    }
    toggleInputs();
    mediaSelect.addEventListener("change", toggleInputs);

    // Categories dynamic
    const wrapper = document.getElementById('category-wrapper');
    let index = wrapper.children.length;
    document.getElementById('add-category').addEventListener('click', function() {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-2', 'category-row');
        row.innerHTML = `
            <div class="col-md-5">
                <select name="categories[${index}][id]" class="form-select">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <select name="categories[${index}][subcategories][]" class="form-select" multiple>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-category">Remove</button>
            </div>
        `;
        wrapper.appendChild(row);
        index++;
    });

    wrapper.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-category')) {
            e.target.closest('.category-row').remove();
        }
    });
});
</script>
@endsection
