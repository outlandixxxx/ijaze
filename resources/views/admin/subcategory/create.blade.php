@extends('layouts.admin')

@section('content')
    <div class="container mt-11">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Create Category</h4>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('storesubcategory') }}" method="POST">
                            @csrf
                            <div class="row">




                               
                                <div class="col-md-6 mb-3">
                                     <label for="name" class="form-label">SubCategory Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" required>
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                              

                                

                            </div>

                            <button type="submit" class="btn btn-dark mt-3">Create Category</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
