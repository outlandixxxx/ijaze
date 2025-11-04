@extends('admin.admin')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 900px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Edit User</h3>
            <a href="{{ route('showuser') }}" class="btn btn-sm btn-dark">Return</a>
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

        <form action="{{ route('updateuser', $user->id) }}" method="POST">
            @csrf
            <div class="row">

                <!-- User Name -->
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- role -->

                <div class="col-md-4 mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
        <option value="">Select Role</option>
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="creator" {{ old('role', $user->role) == 'creator' ? 'selected' : '' }}>Creator</option>
    </select>
    @error('role')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


                <!-- Password (Optional) -->
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password <small class="text-muted">(Leave blank to keep current)</small></label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirmation Password -->
                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-sm btn-success mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
