@extends('admin.admin')

@section('content')


<div class="container m-5">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Edit Post</h3>
            <a href="{{ route('showpost') }}" class="btn btn-sm btn-dark">Return</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('updatepost', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <!-- Category -->
                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select name="categories[]" class="form-select" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($post->categories->pluck('id')->contains($category->id)) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Subcategory -->
                <div class="col-md-6 mb-3">
                    <label>Subcategories</label>
                    <select name="subcategories[]" class="form-select" multiple>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                @if($post->subcategories->pluck('id')->contains($subcategory->id)) selected @endif>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Title -->
                <div class="col-md-6 mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $post->title) }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                           value="{{ old('slug', $post->slug) }}">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Tags -->
                <div class="col-md-6 mb-3">
                    <label>Tags</label>
                    <input type="text" name="tags" class="form-control"
                           value="{{ old('tags', $post->tags->pluck('name')->implode(', ')) }}">
                </div>

                <!-- Description -->
                <div class="col-md-6 mb-3">
                    <label>Short Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $post->description) }}</textarea>
                </div>

                <!-- Content -->
                @include('components.forms.tinymce-editor', ['content' => old('content', $post->content)])

                <!-- Media (same logic as before) -->
                <div class="col-12 mb-3">
                    <label>Main Media</label>
                    @php $media = $post->media->first(); @endphp
                    <select name="media[0][type]" id="media_type" class="form-select mb-2">
                        <option value="image" {{ $media && $media->type === 'image' ? 'selected' : '' }}>Image</option>
                        <option value="videotube" {{ $media && $media->type === 'videotube' ? 'selected' : '' }}>YouTube Video</option>
                        <option value="aivideo" {{ $media && $media->type === 'aivideo' ? 'selected' : '' }}>AI YouTube Video</option>
                    </select>

                    <div id="image_input" class="{{ $media && $media->type !== 'image' ? 'd-none' : '' }}">
                        @if($media && $media->type === 'image')
                            <img src="{{ asset('storage/' . $media->path) }}" alt="Current" width="150" class="rounded mb-2">
                        @endif
                        <input type="file" name="media[0][path]" class="form-control">
                    </div>

                    <div id="video_input" class="{{ $media && in_array($media->type, ['videotube', 'aivideo']) ? '' : 'd-none' }}">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <input type="text" name="media[0][path]" class="form-control"
                                       value="{{ $media && $media->type !== 'image' ? $media->path : '' }}"
                                       placeholder="https://www.youtube.com/embed/...">
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="media[0][thumbnail]" class="form-control">
                                @if($media && $media->thumbnail)
                                    <img src="{{ asset('storage/' . $media->thumbnail) }}" alt="Current" width="120" class="rounded mt-2">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <button class="btn btn-sm btn-success">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- TinyMCE & JS -->
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
                <button type="button" class="btn btn-sm btn-danger remove-category">Remove</button>
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
