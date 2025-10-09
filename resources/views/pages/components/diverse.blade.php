<div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">

    {{-- First row: images --}}
    @forelse ($posts as $post)
        @php $media = $post->media->first(); @endphp
        @if ($media && $media->type === 'image')
            <div class="col card-item d-none">
                <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                    <div class="card bg-dark text-white card-amusing card-hover card-equal">
                        <img src="{{ $media->path ? asset('storage/' . $media->path) : asset('storage/' . $media->thumbnail) }}"
                             class="card-img"
                             alt="{{ $post->title }}">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 60) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    @empty
        <p class="text-muted">لا توجد مقالات</p>
    @endforelse

    <div class="text-center mt-3">
        <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
    </div>
</div>

<h4 class="m-5">صوت و صورة</h4>

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">

    {{-- Second row: videos (display thumbnail) --}}
    @forelse ($posts as $post)
        @php $media = $post->media->first(); @endphp
        @if ($media && in_array($media->type, ['aivideo', 'videotube']))
            <div class="col card-item d-none">
                <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                    <div class="card bg-dark text-white card-amusing card-hover card-equal">
                        <img src="{{ asset('storage/' . $media->thumbnail) }}"
                             class="card-img"
                             alt="{{ $post->title }}">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 60) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    @empty
        <p class="text-muted">لا توجد مقالات</p>
    @endforelse

    <div class="text-center mt-3">
        <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
    </div>
</div>
