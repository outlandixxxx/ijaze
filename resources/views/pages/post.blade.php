@extends('layouts.app')

@section('content')
    <div class="container mt-11">
        <div class="row">

            @if(app()->getLocale() == 'ar')
                <!-- RTL Layout: Share Right, Content Middle, Sidebar Left -->
                
                <!-- Share Sidebar - RIGHT in RTL -->
                <div class="col-12 col-md-1 order-3 order-md-1 mb-3">
                    <div class="d-flex flex-column align-items-center sticky-top" style="top: 100px;">
                        <h6 class="mb-3">{{ __('Share') }}</h6>
                        <ul class="list-unstyled d-flex flex-md-column gap-4 gap-md-3">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on Facebook">
                                    <i class="fa-brands fa-square-facebook fa-2xl text-primary"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on Twitter">
                                    <i class="fa-brands fa-square-x-twitter fa-2xl text-white"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on WhatsApp">
                                    <i class="fa-brands fa-square-whatsapp fa-2xl text-success"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on LinkedIn">
                                    <i class="fa-brands fa-square-linkedin fa-2xl text-primary"></i></a></li>
                            <li><a href="javascript:void(0);" onclick="copyPageLink()" title="{{ __('Copy Link') }}">
                                    <i class="fa-solid fa-link fa-2xl text-white"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content - MIDDLE -->
                <div class="col-12 col-md-8 order-1 order-md-2">
                    
                    <div id="post-title">
                        <span>{{ $post->title }}</span>
                    </div>

                    <!-- Media -->
                    @php $media = $post->media->first(); @endphp
                    @if ($media)
                        @if (strtolower($media->type) === 'image')
                            <img src="{{ asset('storage/' . $media->path) }}" class="img-fluid rounded mb-3"
                                alt="{{ $post->title }}" style="max-height:500px; width:100%; object-fit:cover;">
                        @elseif(strtolower($media->type) === 'aivideo')
                            <div class="mb-3 text-center">
                                <iframe width="356" height="633" src="{{ $media->path }}" title="{{ $post->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        @elseif(strtolower($media->type) === 'videotube')
                            <div class="mb-3 text-center">
                                <iframe src="{{ $media->path }}" class="w-100" style="height:400px;" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    @endif

                    <!-- Post meta -->
                    <div class="post-meta">
                        <div class="meta-left">
                            <i class="fa-regular fa-comments"></i>
                            <span>{{ $post->comments_count ?? 0 }} {{ __('Comments') }}</span>
                        </div>

                        <div class="meta-right">
                            <span class="author">
                                <i class="fa-regular fa-user"></i>
                                {{ __('By') }} {{ $post->author->name ?? __('Site Admin') }}
                            </span>
                            <span class="date">
                                <i class="fa-regular fa-clock"></i>
                                {{ $post->created_at->format('l d F Y - H:i') }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="post-content mt-5 fs-5">
                        {!! $post->content !!}
                    </div>

                    <!-- Tags -->
                    <div class="mb-3">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tag', $tag->name) }}" class="badge bg-light text-dark me-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <!-- Related posts -->
                    <div class="mt-5">
                        <h3>{{ __('Related Topics') }}</h3>
                        <div class="swiper cardSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($relatedPosts as $related)
                                    @php $relatedMedia = $related->media->first(); @endphp
                                    <div class="swiper-slide">
                                        <div class="card text-bg-dark position-relative" style="aspect-ratio:9/16; border-radius:20px; overflow:hidden;">
                                            @if ($relatedMedia)
                                                <img src="{{ asset('storage/' . ($relatedMedia->thumbnail ?? $relatedMedia->path)) }}"
                                                    class="card-img position-absolute top-0 start-0 w-100 h-100" 
                                                    style="object-fit: cover;"
                                                    alt="{{ $related->title }}">
                                            @endif
                                            <div class="card-img-overlay d-flex align-items-end p-3" 
                                                 style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, transparent 100%);">
                                                <h5 class="mb-0 fs-6 fw-bold">
                                                    <a href="{{ route('article', $related->slug) }}"
                                                       class="text-white text-decoration-none">
                                                        {{ Str::limit($related->title, 60) }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="comment-section mt-5">
                        <h4 class="comment-title">
                            <i class="fa-regular fa-comments"></i> {{ __('Add Your Comment') }}
                        </h4>

                        <p class="comment-note">
                            {{ __('Please keep comments respectful and constructive. All opinions are welcome.') }}
                        </p>

                        <form action="{{ route('store.comment', $post->id) }}" method="POST" class="comment-form">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">{{ __('Full Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="{{ __('Enter your name') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="example@email.com" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea id="comment" name="comment" class="form-control" rows="4"
                                    placeholder="{{ __('Write your comment here...') }}" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-comment">
                                <i class="fa-regular fa-paper-plane"></i> {{ __('Submit Comment') }}
                            </button>
                        </form>

                        <!-- Existing Comments -->
                        <div id="comments-list" class="bg-transparent mt-4">
                            @foreach ($post->comments as $comment)
                                <div class="single-comment mb-3 p-3 rounded" id="comment-{{ $comment->id }}">
                                    <strong>{{ $comment->name }}</strong>
                                    <span class="text-muted"> - {{ $comment->created_at->diffForHumans() }}</span>
                                    <p class="mt-2">{{ $comment->content }}</p>

                                    <div class="comment-reactions d-flex align-items-center gap-3 mt-2">
                                        <button class="btn btn-sm btn-outline-primary react-btn" data-id="{{ $comment->id }}" data-reaction="like">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                            <span id="likes-{{ $comment->id }}">{{ $comment->likes_count }}</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger react-btn" data-id="{{ $comment->id }}" data-reaction="dislike">
                                            <i class="fa-regular fa-thumbs-down"></i>
                                            <span id="dislikes-{{ $comment->id }}">{{ $comment->dislikes_count }}</span>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- Previous News Sidebar - LEFT in RTL -->
                <div class="col-12 col-md-3 order-2 order-md-3 mb-3">
                    <div id="third-title">
                        <span>{{ __('Previous News') }}</span>
                    </div>
                    <ul class="list-unstyled border-top pt-2">
                        @forelse($previousImages as $prev)
                            <li class="mb-2">
                                <a href="{{ route('article', $prev->slug) }}"
                                    class="d-flex align-items-center gap-2 text-decoration-none text-white">
                                    <span class="fs-6 text-nowrap flex-shrink-0" style="min-width: 80px;">
                                        {{ $prev->created_at->format('d-m-Y') }}
                                    </span>
                                    <h5 class="mb-0 fs-6 text-truncate flex-grow-1">
                                        {{ $prev->title }}
                                    </h5>
                                </a>
                            </li>
                        @empty
                            <p class="text-muted">{{ __('No news available') }}</p>
                        @endforelse
                    </ul>

                    <div id="third-title">
                        <span>{{ __('Audio & Video') }}</span>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        @foreach ($previousVideos as $video)
                            @php $media = $video->media->first(); @endphp
                            @if ($media)
                                <li>
                                    <a href="{{ route('article', $video->slug) }}" class="d-block text-decoration-none">
                                        <div class="position-relative rounded overflow-hidden" style="height: 200px; width: 100%;">
                                            <img src="{{ asset('storage/' . $media->thumbnail) }}" class="w-100 h-100"
                                                alt="{{ $video->title }}" style="object-fit: cover;">

                                            <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center p-1 small">
                                                {{ Str::limit($video->title, 50) }}
                                            </div>

                                            <div class="position-absolute top-0 start-0 m-2 text-white">
                                                <i class="fa-solid fa-circle-play fa-lg"></i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

            @else
                <!-- LTR Layout: Share Left, Content Middle, Sidebar Right -->
                
                <!-- Share Sidebar - LEFT in LTR -->
                <div class="col-12 col-md-1 order-3 order-md-1 mb-3">
                    <div class="d-flex flex-column align-items-center sticky-top" style="top: 100px;">
                        <h6 class="mb-3">{{ __('Share') }}</h6>
                        <ul class="list-unstyled d-flex flex-md-column gap-4 gap-md-3">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on Facebook">
                                    <i class="fa-brands fa-square-facebook fa-2xl text-primary"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on Twitter">
                                    <i class="fa-brands fa-square-x-twitter fa-2xl text-white"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on WhatsApp">
                                    <i class="fa-brands fa-square-whatsapp fa-2xl text-success"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" aria-label="Share on LinkedIn">
                                    <i class="fa-brands fa-square-linkedin fa-2xl text-primary"></i></a></li>
                            <li><a href="javascript:void(0);" onclick="copyPageLink()" title="{{ __('Copy Link') }}">
                                    <i class="fa-solid fa-link fa-2xl text-white"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content - MIDDLE (same as RTL, repeated) -->
                <div class="col-12 col-md-8 order-1 order-md-2">
                    
                    <div id="post-title">
                        <span>{{ $post->title }}</span>
                    </div>

                    <!-- Media -->
                    @php $media = $post->media->first(); @endphp
                    @if ($media)
                        @if (strtolower($media->type) === 'image')
                            <img src="{{ asset('storage/' . $media->path) }}" class="img-fluid rounded mb-3"
                                alt="{{ $post->title }}" style="max-height:500px; width:100%; object-fit:cover;">
                        @elseif(strtolower($media->type) === 'aivideo')
                            <div class="mb-3 text-center">
                                <iframe width="356" height="633" src="{{ $media->path }}" title="{{ $post->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        @elseif(strtolower($media->type) === 'videotube')
                            <div class="mb-3 text-center">
                                <iframe src="{{ $media->path }}" class="w-100" style="height:400px;" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    @endif

                    <!-- Post meta -->
                    <div class="post-meta">
                        <div class="meta-left">
                            <i class="fa-regular fa-comments"></i>
                            <span>{{ $post->comments_count ?? 0 }} {{ __('Comments') }}</span>
                        </div>

                        <div class="meta-right">
                            <span class="author">
                                <i class="fa-regular fa-user"></i>
                                {{ __('By') }} {{ $post->author->name ?? __('Site Admin') }}
                            </span>
                            <span class="date">
                                <i class="fa-regular fa-clock"></i>
                                {{ $post->created_at->format('l d F Y - H:i') }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="post-content mt-5 fs-5">
                        {!! $post->content !!}
                    </div>

                    <!-- Tags -->
                    <div class="mb-3">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tag', $tag->name) }}" class="badge bg-light text-dark me-1">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <!-- Related posts -->
                    <div class="mt-5">
                        <h3>{{ __('Related Topics') }}</h3>
                        <div class="swiper cardSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($relatedPosts as $related)
                                    @php $relatedMedia = $related->media->first(); @endphp
                                    <div class="swiper-slide">
                                        <div class="card text-bg-dark position-relative" style="aspect-ratio:9/16; border-radius:20px; overflow:hidden;">
                                            @if ($relatedMedia)
                                                <img src="{{ asset('storage/' . ($relatedMedia->thumbnail ?? $relatedMedia->path)) }}"
                                                    class="card-img position-absolute top-0 start-0 w-100 h-100" 
                                                    style="object-fit: cover;"
                                                    alt="{{ $related->title }}">
                                            @endif
                                            <div class="card-img-overlay d-flex align-items-end p-3" 
                                                 style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, transparent 100%);">
                                                <h5 class="mb-0 fs-6 fw-bold">
                                                    <a href="{{ route('article', $related->slug) }}"
                                                       class="text-white text-decoration-none">
                                                        {{ Str::limit($related->title, 60) }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="comment-section mt-5">
                        <h4 class="comment-title">
                            <i class="fa-regular fa-comments"></i> {{ __('Add Your Comment') }}
                        </h4>

                        <p class="comment-note">
                            {{ __('Please keep comments respectful and constructive. All opinions are welcome.') }}
                        </p>

                        <form action="{{ route('store.comment', $post->id) }}" method="POST" class="comment-form">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">{{ __('Full Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="{{ __('Enter your name') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="example@email.com" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea id="comment" name="comment" class="form-control" rows="4"
                                    placeholder="{{ __('Write your comment here...') }}" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-comment">
                                <i class="fa-regular fa-paper-plane"></i> {{ __('Submit Comment') }}
                            </button>
                        </form>

                        <!-- Existing Comments -->
                        <div id="comments-list" class="bg-transparent mt-4">
                            @foreach ($post->comments as $comment)
                                <div class="single-comment mb-3 p-3 rounded" id="comment-{{ $comment->id }}">
                                    <strong>{{ $comment->name }}</strong>
                                    <span class="text-muted"> - {{ $comment->created_at->diffForHumans() }}</span>
                                    <p class="mt-2">{{ $comment->content }}</p>

                                    <div class="comment-reactions d-flex align-items-center gap-3 mt-2">
                                        <button class="btn btn-sm btn-outline-primary react-btn" data-id="{{ $comment->id }}" data-reaction="like">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                            <span id="likes-{{ $comment->id }}">{{ $comment->likes_count }}</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger react-btn" data-id="{{ $comment->id }}" data-reaction="dislike">
                                            <i class="fa-regular fa-thumbs-down"></i>
                                            <span id="dislikes-{{ $comment->id }}">{{ $comment->dislikes_count }}</span>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- Previous News Sidebar - RIGHT in LTR -->
                <div class="col-12 col-md-3 order-2 order-md-3 mb-3">
                    <div id="third-title">
                        <span>{{ __('Previous News') }}</span>
                    </div>
                    <ul class="list-unstyled border-top pt-2">
                        @forelse($previousImages as $prev)
                            <li class="mb-2">
                                <a href="{{ route('article', $prev->slug) }}"
                                    class="d-flex align-items-center gap-2 text-decoration-none text-white">
                                    <span class="fs-6 text-nowrap flex-shrink-0" style="min-width: 80px;">
                                        {{ $prev->created_at->format('d-m-Y') }}
                                    </span>
                                    <h5 class="mb-0 fs-6 text-truncate flex-grow-1">
                                        {{ $prev->title }}
                                    </h5>
                                </a>
                            </li>
                        @empty
                            <p class="text-muted">{{ __('No news available') }}</p>
                        @endforelse
                    </ul>

                    <div id="third-title">
                        <span>{{ __('Audio & Video') }}</span>
                    </div>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        @foreach ($previousVideos as $video)
                            @php $media = $video->media->first(); @endphp
                            @if ($media)
                                <li>
                                    <a href="{{ route('article', $video->slug) }}" class="d-block text-decoration-none">
                                        <div class="position-relative rounded overflow-hidden" style="height: 200px; width: 100%;">
                                            <img src="{{ asset('storage/' . $media->thumbnail) }}" class="w-100 h-100"
                                                alt="{{ $video->title }}" style="object-fit: cover;">

                                            <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center p-1 small">
                                                {{ Str::limit($video->title, 50) }}
                                            </div>

                                            <div class="position-absolute top-0 start-0 m-2 text-white">
                                                <i class="fa-solid fa-circle-play fa-lg"></i>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

    <script>
        // Copy link function
        function copyPageLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert("{{ __('Link copied!') }}");
            });
        }

        // Comment reactions
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.react-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.dataset.id;
                    const reaction = this.dataset.reaction;

                    const likeSpan = document.getElementById(`likes-${commentId}`);
                    const dislikeSpan = document.getElementById(`dislikes-${commentId}`);
                    if (!likeSpan || !dislikeSpan) return;

                    fetch(`/comments/${commentId}/react`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ reaction })
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeSpan.textContent = data.likes;
                            dislikeSpan.textContent = data.dislikes;

                            const parent = this.closest('.comment-reactions');
                            parent.querySelectorAll('.react-btn').forEach(btn => {
                                btn.classList.remove('btn-primary', 'btn-danger');
                                btn.classList.add(btn.dataset.reaction === 'like' ? 'btn-outline-primary' : 'btn-outline-danger');
                            });

                            if (data.status === 'added') {
                                if (reaction === 'like') {
                                    this.classList.remove('btn-outline-primary');
                                    this.classList.add('btn-primary');
                                } else {
                                    this.classList.remove('btn-outline-danger');
                                    this.classList.add('btn-danger');
                                }
                            }
                        })
                        .catch(console.error);
                });
            });
        });
    </script>

@endsection
