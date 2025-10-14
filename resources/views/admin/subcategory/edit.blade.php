@extends('admin.admin')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow-lg p-4" style="width: 100%; max-width: 900px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Edit subcategory</h3>
            <a href="{{ route('showsubcategory') }}" class="btn btn-sm btn-dark">Return</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updatesubcategory', $subcategory->id) }}" method="POST">
            @csrf
           

            <div class="row">
                <!-- subcategory Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">subcategory Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        value="{{ old('name', $subcategory->name) }}" 
                        required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug (optional)</label>
                    <input 
                        type="text" 
                        name="slug" 
                        id="slug" 
                        class="form-control" 
                        value="{{ old('slug', $subcategory->slug) }}">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary px-4">Update</button>
            </div>
        </form>
    </div>

</div>
@endsection
