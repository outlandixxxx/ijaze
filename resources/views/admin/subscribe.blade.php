@extends('admin.admin')

@section('content')
<div class=" flex-grow-1 ">

    <!-- Header -->
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h3 class="h2 mb-0 ls-tight">Subscribers Management</h3>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">

            {{-- Stats Cards --}}
            <div class="row g-6 mb-6">
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Subscribers</span>
                                    <span class="h3 font-bold mb-0">{{ $totalSubscribers }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Today</span>
                                    <span class="h3 font-bold mb-0">{{ $todaySubscribers }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white text-lg rounded-circle">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">This Month</span>
                                    <span class="h3 font-bold mb-0">{{ $thisMonthSubscribers }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class="bi bi-calendar-month"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter Form --}}
            <div class="card shadow border-0 mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-funnel me-2"></i>Filter Subscribers</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('showsubscribe') }}">
                        <div class="row g-3">
                            {{-- Email Search --}}
                            <div class="col-md-4">
                                <label for="search" class="form-label">Email</label>
                                <input type="text" 
                                       name="search" 
                                       id="search"
                                       class="form-control" 
                                       placeholder="Search by email..."
                                       value="{{ request()->input('search') }}">
                            </div>

                            {{-- Date From --}}
                            <div class="col-md-3">
                                <label for="date_from" class="form-label">From Date</label>
                                <input type="date" 
                                       name="date_from" 
                                       id="date_from"
                                       class="form-control"
                                       value="{{ request()->input('date_from') }}">
                            </div>

                            {{-- Date To --}}
                            <div class="col-md-3">
                                <label for="date_to" class="form-label">To Date</label>
                                <input type="date" 
                                       name="date_to" 
                                       id="date_to"
                                       class="form-control"
                                       value="{{ request()->input('date_to') }}">
                            </div>

                            {{-- Buttons --}}
                            <div class="col-md-2 d-flex align-items-end">
                                <div class="w-100">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">
                                        <i class="bi bi-search me-1"></i>Filter
                                    </button>
                                    @if(request()->hasAny(['search', 'date_from', 'date_to']))
                                        <a href="{{ route('subscribers.index') }}" class="btn btn-secondary w-100">
                                            <i class="bi bi-x-circle me-1"></i>Clear
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Results Info --}}
            @if(request()->hasAny(['search', 'date_from', 'date_to']))
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>Active Filters:</strong>
                    @if(request()->filled('search'))
                        Email: "{{ request()->input('search') }}"
                    @endif
                    @if(request()->filled('date_from'))
                        | From: {{ \Carbon\Carbon::parse(request()->input('date_from'))->format('M d, Y') }}
                    @endif
                    @if(request()->filled('date_to'))
                        | To: {{ \Carbon\Carbon::parse(request()->input('date_to'))->format('M d, Y') }}
                    @endif
                    | Results: <strong>{{ $subscribers->total() }}</strong>
                </div>
            @endif

            {{-- Subscribers Table --}}
            <div class="card shadow border-0">
                <div class="card-header">
                    <h5 class="mb-0">All Subscribers</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Subscribed Date</th>
                                <th>Time</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscribers as $subscriber)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration + ($subscribers->currentPage() - 1) * $subscribers->perPage() }}</td>
                                    
                                    {{-- Email with highlight --}}
                                    <td class="align-middle">
                                        @if(request()->filled('search'))
                                            {!! str_ireplace(request()->input('search'), 
                                                '<mark>' . request()->input('search') . '</mark>', 
                                                $subscriber->email) !!}
                                        @else
                                            {{ $subscriber->email }}
                                        @endif
                                    </td>
                                    
                                    {{-- Date --}}
                                    <td class="align-middle">
                                        <i class="bi bi-calendar3 text-muted me-1"></i>
                                        {{ $subscriber->created_at->format('M d, Y') }}
                                    </td>

                                    {{-- Time --}}
                                    <td class="align-middle">
                                        <i class="bi bi-clock text-muted me-1"></i>
                                        {{ $subscriber->created_at->format('h:i A') }}
                                        <small class="text-muted d-block">{{ $subscriber->created_at->diffForHumans() }}</small>
                                    </td>

                                    {{-- Delete Button --}}
                                    <td class="text-end">
                                        <form action="{{ route('destroysubscriber', $subscriber->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete subscriber: {{ $subscriber->email }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        @if(request()->hasAny(['search', 'date_from', 'date_to']))
                                            <i class="bi bi-search fs-1 d-block mb-3"></i>
                                            No subscribers found matching your filters
                                        @else
                                            <i class="bi bi-people fs-1 d-block mb-3"></i>
                                            No subscribers yet
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Showing {{ $subscribers->firstItem() ?? 0 }} to {{ $subscribers->lastItem() ?? 0 }} of {{ $subscribers->total() }} subscribers
                        </div>
                        <div>
                            {{ $subscribers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
