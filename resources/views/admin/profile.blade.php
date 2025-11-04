@extends('admin.admin')

@section('content')
<div class=" flex-grow-1 ">    <!-- Header -->
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h3 class="h2 mb-0 ls-tight">My Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Profile Information Card --}}
                    <div class="card shadow border-0 mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Name</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control-plaintext">{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <p class="form-control-plaintext">{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Role</label>
                                </div>
                                <div class="col-md-8">
                                    <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-info' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Change Password Card --}}
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <h5 class="mb-0">Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.updatePassword') }}">
                                @csrf

                                {{-- Current Password --}}
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" 
                                           name="current_password" 
                                           id="current_password" 
                                           class="form-control @error('current_password') is-invalid @enderror"
                                           required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" 
                                           name="new_password" 
                                           id="new_password" 
                                           class="form-control @error('new_password') is-invalid @enderror"
                                           required>
                                    <small class="text-muted">Must be at least 8 characters with letters and numbers</small>
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm New Password --}}
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" 
                                           name="new_password_confirmation" 
                                           id="new_password_confirmation" 
                                           class="form-control"
                                           required>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-lock me-2"></i>Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@endsection
