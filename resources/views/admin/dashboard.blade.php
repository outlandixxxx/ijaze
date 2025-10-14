@extends('admin.admin')
@section('content')
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Analytics</h1>
                        </div>
                    </div>
                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                Here you can find all the data concerning posts, events, and activities of all members and posts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">

                <!-- Card stats -->
                <div class="row g-6 mb-6">

                    <!-- Posts -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total of posts</span>
                                        <span class="h3 font-bold mb-0">{{ $stats['posts'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    @php $growth = $evolution['posts']; @endphp
                                    <span class="badge badge-pill {{ $growth >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger' }} me-2">
                                        <i class="bi {{ $growth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }} me-1"></i>
                                        {{ abs($growth) }}%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visitors -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total of visitors</span>
                                        <span class="h3 font-bold mb-0">{{ $stats['visitors'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    @php $growth = $evolution['visitors']; @endphp
                                    <span class="badge badge-pill {{ $growth >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger' }} me-2">
                                        <i class="bi {{ $growth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }} me-1"></i>
                                        {{ abs($growth) }}%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total comments</span>
                                        <span class="h3 font-bold mb-0">{{ $stats['comments'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-chat-dots"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    @php $growth = $evolution['comments']; @endphp
                                    <span class="badge badge-pill {{ $growth >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger' }} me-2">
                                        <i class="bi {{ $growth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }} me-1"></i>
                                        {{ abs($growth) }}%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscriptions -->
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total of subscriptions</span>
                                        <span class="h3 font-bold mb-0">{{ $stats['subscriptions'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    @php $growth = $evolution['subscriptions']; @endphp
                                    <span class="badge badge-pill {{ $growth >= 0 ? 'bg-soft-success text-success' : 'bg-soft-danger text-danger' }} me-2">
                                        <i class="bi {{ $growth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }} me-1"></i>
                                        {{ abs($growth) }}%
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Authors table -->
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Details of always</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Creator of posts</th>
                                    <th scope="col">Number of posts</th>
                                    <th scope="col">Number of Views</th>
                                    <th scope="col">Number of comments</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($authors as $a)
                                    <tr>
                                        <td>
                                            <img alt="..." src="https://ui-avatars.com/api/?name={{ urlencode($a['user']->name) }}" class="avatar avatar-sm rounded-circle me-2">
                                            <a class="text-heading font-semibold" href="#">
                                                {{ $a['user']->name }}
                                            </a>
                                        </td>
                                        <td>{{ $a['posts'] }}</td>
                                        <td>{{ $a['visitors'] }}</td>
                                        <td>{{ $a['comments'] }}</td>
                                        <td>{{ $a['created_at']->format('M d, Y') }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-neutral">View</a>
                                           
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No authors found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing {{ $authors->count() }} authors</span>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection
