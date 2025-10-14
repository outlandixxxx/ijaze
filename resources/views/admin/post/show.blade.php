


@extends('admin.admin')

@section('content')
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">

        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Posts</h1>
                        </div>



                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="{{ route('createpost') }}" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class="pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create a new post</span>
                                </a>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item">
                            <a href="#my-posts" class="nav-link active" data-bs-toggle="tab">My Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="#all-posts" class="nav-link" data-bs-toggle="tab">All Posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <div class="tab-content mt-4">

                    {{-- ===================== MY POSTS TAB ===================== --}}
                    <div class="tab-pane fade show active" id="my-posts">

                        <!-- Card stats -->
                        <div class="row g-6 mb-6">
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total of published posts
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $myStats['posts'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                    <i class="bi bi-newspaper"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total of views on my posts
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $myStats['views'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                    <i class="bi bi-eye"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total accepted comments
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $myStats['comments'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                    <i class="bi bi-chat-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Posts Card -->
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-1">Media
                                                    Posts</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <div
                                                        class="icon icon-shape bg-success text-white text-lg rounded-circle mb-1">
                                                        <i class="bi bi-image"></i>
                                                    </div>
                                                    <div class="h5 font-bold mb-0">{{ $myStats['image_posts'] ?? 0 }}</div>
                                                    <small class="text-muted">Images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <div
                                                        class="icon icon-shape bg-danger text-white text-lg rounded-circle mb-1">
                                                        <i class="bi bi-play-btn"></i>
                                                    </div>
                                                    <div class="h5 font-bold mb-0">{{ $myStats['video_posts'] ?? 0 }}</div>
                                                    <small class="text-muted">Videos</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Table -->
                        <div class="card shadow border-0 mb-7">
                            <div class="card-header">
                                <h5 class="mb-0">My Posts (All Time)</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Thumbnail</th>
                                            <th>Views</th>
                                            <th>Comments</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($myPosts as $post)
                                            <tr>
                                                <td class="align-middle">
                                                    <a href="{{ route('article', $post->slug) }}"
                                                        class="text-heading font-semibold">
                                                        {{ $post->title }}
                                                    </a>
                                                </td>
                                                <td class="align-middle">{{ $post->created_at->format('M d, Y') }}</td>



                                                <td class="align-middle">
                                                    @php
                                                        $image = null;
                                                        if ($post->media->first()) {
                                                            $media = $post->media->first(); // get the first media
                                                            $image = $media->thumbnail ?? ($media->path ?? null);
                                                        }
                                                    @endphp
                                                    @if ($image)
                                                        <img src="{{ asset('storage/' . $image) }}" alt="thumbnail"
                                                            class="avatar avatar-lg  me-2">
                                                    @else
                                                        <img src="{{ asset('images/default-thumb.jpg') }}"
                                                            alt="default thumbnail" class="avatar avatar me-2">
                                                    @endif
                                                </td>

                                                <td class="align-middle">{{ $post->views_count ?? 0 }}</td>
                                                <td class="align-middle">{{ $post->comments_count ?? 0 }}</td>
                                                 <td class="text-end">
                                                    <a href="{{ route('article', $post->slug) }}"
                                                        class="btn btn-sm btn-neutral">View</a>
                                                    <a href="{{ route('editpost', $post->id) }}"
                                                        class="btn btn-sm btn-warning text-primary-emphasis">Edit</a>

                                                    <a href="{{ route('deletepost', $post->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-4">No posts found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    {{-- ===================== ALL POSTS TAB ===================== --}}
                    <div class="tab-pane fade" id="all-posts">


                        <!-- Card stats for all posts -->
                        <div class="row g-6 mb-6">
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total of published posts
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $allStats['posts'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                    <i class="bi bi-newspaper"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total of views on all posts
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $allStats['views'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                    <i class="bi bi-eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                    Total accepted comments by all members
                                                </span>
                                                <span class="h3 font-bold mb-0">{{ $allStats['comments'] ?? 0 }}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                    <i class="bi bi-chat-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Posts Card -->
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-1">Media
                                                    Posts</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <div
                                                        class="icon icon-shape bg-success text-white text-lg rounded-circle mb-1">
                                                        <i class="bi bi-image"></i>
                                                    </div>
                                                    <div class="h5 font-bold mb-0">{{ $allStats['image_posts'] ?? 0 }}
                                                    </div>
                                                    <small class="text-muted">Images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <div
                                                        class="icon icon-shape bg-danger text-white text-lg rounded-circle mb-1">
                                                        <i class="bi bi-play-btn"></i>
                                                    </div>
                                                    <div class="h5 font-bold mb-0">{{ $allStats['video_posts'] ?? 0 }}
                                                    </div>
                                                    <small class="text-muted">Videos</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Table -->

                        <div class="card shadow border-0 mb-7">
                            <div class="card-header">
                                <h5 class="mb-0">All Posts</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Thumbnail</th>
                                            <th>Views</th>
                                            <th>Comments</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($allPosts as $post)
                                            <tr>
                                                <td class="align-middle">{{ $post->title }}</td>
                                                <td class="align-middle">{{ $post->author?->name ?? 'N/A' }}</td>

                                                <td class="align-middle">{{ $post->created_at->format('M d, Y') }}</td>


                                                <td class="align-middle">
                                                    @php
                                                        $image = null;
                                                        if ($post->media->first()) {
                                                            $media = $post->media->first(); // get the first media
                                                            $image = $media->thumbnail ?? ($media->path ?? null);
                                                        }
                                                    @endphp
                                                    @if ($image)
                                                        <img src="{{ asset('storage/' . $image) }}" alt="thumbnail"
                                                            class="avatar avatar-lg  me-2">
                                                    @else
                                                        <img src="{{ asset('images/default-thumb.jpg') }}"
                                                            alt="default thumbnail" class="avatar avatar me-2">
                                                    @endif
                                                </td>



                                                <td class="align-middle">{{ $post->views_count ?? 0 }}</td>
                                                <td class="align-middle">{{ $post->comments_count ?? 0 }}</td>

                                                <td class="text-end">
                                                    <a href="{{ route('article', $post->slug) }}"
                                                        class="btn btn-sm btn-neutral">View</a>
                                                    <a href="{{ route('editpost', $post->id) }}"
                                                        class="btn btn-sm btn-warning text-primary-emphasis">Edit</a>

                                                    <a href="{{ route('deletepost', $post->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">No posts found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div> <!-- tab-content -->
            </div>
        </main>
    </div>
@endsection
