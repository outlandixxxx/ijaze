

 @extends('admin.admin')

@section('content')
<div class=" flex-grow-1 ">
    <!-- Header -->
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-5 mb-sm-5">
                        <h1 class="h2 mb-0 ls-tight">Subategories Management</h1>
                    </div>

                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <a href="{{ route('createsubcategory') }}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class="pe-2"><i class="bi bi-plus"></i></span>
                                <span>Create a new subcategory</span>
                            </a>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="tab-content mt-4">
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">All subcategories</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Image Posts</th>
                                    <th>Video Posts</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>{{ $subcategory->created_at->format('M d, Y') }}</td>
                                        <td>{{ $subcategory->image_count }}</td>
                                        <td>{{ $subcategory->video_count }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('editsubcategory', $subcategory->id) }}"
                                               class="btn btn-sm btn-warning text-primary-emphasis">Edit</a>

                                            <a href="{{ route('deletesubcategory', $subcategory->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">No subcategory found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
