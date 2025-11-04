@extends('admin.admin')

@section('content')
<div class=" flex-grow-1 ">
    <!-- Header -->
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h3 class="h2 mb-0 ls-tight">Comments Management</h3>
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
            
            {{-- Search Form --}}
            <div class="card shadow border-0 mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('showcomment') }}">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-10">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" 
                                           name="search" 
                                           class="form-control border-start-0" 
                                           placeholder="Search comments by name or email..."
                                           value="{{ request()->input('search') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-search me-2"></i>Search
                                </button>
                            </div>
                        </div>
                        @if(request()->has('search') && !empty(request()->input('search')))
                            <div class="mt-3">
                                <a href="{{ route('showcomment') }}" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-x-circle me-1"></i>Clear Search
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            {{-- Results Info --}}
            @if(request()->has('search') && !empty(request()->input('search')))
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Showing results for: <strong>"{{ request()->input('search') }}"</strong>
                    ({{ $comments->total() }} {{ $comments->total() == 1 ? 'result' : 'results' }})
                </div>
            @endif

            {{-- Comments Table --}}
            <div class="card shadow border-0">
                <div class="card-header">
                    <h5 class="mb-0">All Comments</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>Type</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>Comment</th>
                                <th>Replies</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    {{-- Type Badge --}}
                                    <td class="align-middle">
                                        @if(is_null($comment->parent_id))
                                            <span class="badge bg-primary">Parent</span>
                                        @else
                                            <span class="badge bg-secondary">Reply</span>
                                        @endif
                                    </td>

                                    {{-- Author with search highlight --}}
                                    <td class="align-middle">
                                        @if(request()->has('search') && !empty(request()->input('search')))
                                            {!! str_ireplace(request()->input('search'), 
                                                '<mark>' . request()->input('search') . '</mark>', 
                                                $comment->name) !!}
                                        @else
                                            {{ $comment->name }}
                                        @endif
                                    </td>

                                    {{-- Email with search highlight --}}
                                    <td class="align-middle">
                                        @if(request()->has('search') && !empty(request()->input('search')))
                                            {!! str_ireplace(request()->input('search'), 
                                                '<mark>' . request()->input('search') . '</mark>', 
                                                $comment->email) !!}
                                        @else
                                            {{ $comment->email }}
                                        @endif
                                    </td>

                                    {{-- Post Title --}}
                                    <td class="align-middle">
                                        @if($comment->post)
                                            <a href="{{ route('article', $comment->post->slug) }}" 
                                               class="text-primary" 
                                               target="_blank"
                                               title="{{ $comment->post->title }}">
                                                {{ Str::limit($comment->post->title, 30) }}
                                            </a>
                                        @else
                                            <span class="text-muted">Post deleted</span>
                                        @endif

                                        {{-- Show parent comment if this is a reply --}}
                                        @if($comment->parent)
                                            <br>
                                            <small class="text-muted">
                                                <i class="bi bi-arrow-return-right"></i>
                                                Reply to: {{ Str::limit($comment->parent->name, 20) }}
                                            </small>
                                        @endif
                                    </td>

                                    {{-- Comment Content --}}
                                    <td class="align-middle">
                                        {{ Str::limit($comment->content, 50) }}
                                    </td>

                                    {{-- Replies Count (only for parents) --}}
                                    <td class="align-middle">
                                        @if(is_null($comment->parent_id))
                                            <span class="badge bg-info">
                                                {{ $comment->replies->count() }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    {{-- Date --}}
                                    <td class="align-middle">
                                        <small>{{ $comment->created_at->format('M d, Y') }}</small>
                                        <br>
                                        <small class="text-muted">{{ $comment->created_at->format('h:i A') }}</small>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="text-end">
                                        <button type="button" 
                                                class="btn btn-sm btn-neutral" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#viewModal{{ $comment->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        
                                        <form action="{{ route('comments.destroy', $comment->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirmDelete({{ $comment->id }}, {{ is_null($comment->parent_id) ? 'true' : 'false' }}, {{ $comment->replies->count() }})">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewModal{{ $comment->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Comment Details
                                                    @if(is_null($comment->parent_id))
                                                        <span class="badge bg-primary ms-2">Parent</span>
                                                    @else
                                                        <span class="badge bg-secondary ms-2">Reply</span>
                                                    @endif
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <strong>Author:</strong> {{ $comment->name }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Email:</strong> {{ $comment->email }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Post:</strong> 
                                                    @if($comment->post)
                                                        <a href="{{ route('article', $comment->post->slug) }}" target="_blank">
                                                            {{ $comment->post->title }}
                                                        </a>
                                                    @endif
                                                </div>

                                                @if($comment->parent)
                                                    <div class="mb-3">
                                                        <strong>Replying to:</strong>
                                                        <div class="border-start border-3 border-secondary ps-3 mt-2">
                                                            <small class="text-muted">{{ $comment->parent->name }}</small>
                                                            <p class="mb-0 mt-1">{{ Str::limit($comment->parent->content, 100) }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="mb-3">
                                                    <strong>Comment:</strong>
                                                    <p class="mt-2 p-3 bg-light rounded">{{ $comment->content }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Likes:</strong> 
                                                    <span class="badge bg-success">{{ $comment->likes_count }}</span>
                                                    <strong class="ms-3">Dislikes:</strong> 
                                                    <span class="badge bg-danger">{{ $comment->dislikes_count }}</span>
                                                </div>
                                                <div>
                                                    <strong>Date:</strong> {{ $comment->created_at->format('F d, Y h:i A') }}
                                                </div>

                                                @if($comment->replies->count() > 0)
                                                    <hr>
                                                    <h6 class="mb-3">
                                                        <i class="bi bi-chat-dots me-2"></i>
                                                        Replies ({{ $comment->replies->count() }})
                                                    </h6>
                                                    @foreach($comment->replies as $reply)
                                                        <div class="border-start border-3 border-primary ps-3 mb-3 py-2">
                                                            <div class="d-flex justify-content-between">
                                                                <small class="text-muted">
                                                                    <strong>{{ $reply->name }}</strong> - {{ $reply->created_at->diffForHumans() }}
                                                                </small>
                                                            </div>
                                                            <p class="mb-0 mt-2">{{ $reply->content }}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        @if(request()->has('search') && !empty(request()->input('search')))
                                            <i class="bi bi-search fs-1 d-block mb-3"></i>
                                            No comments found matching "<strong>{{ request()->input('search') }}</strong>"
                                        @else
                                            <i class="bi bi-chat-dots fs-1 d-block mb-3"></i>
                                            No comments found
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- JavaScript for Delete Confirmation --}}
<script>
function confirmDelete(commentId, isParent, repliesCount) {
    if (isParent && repliesCount > 0) {
        return confirm(`This will delete the parent comment AND all ${repliesCount} replies. Are you sure?`);
    } else if (isParent) {
        return confirm('Are you sure you want to delete this parent comment?');
    } else {
        return confirm('Are you sure you want to delete this reply?');
    }
}
</script>
@endsection
