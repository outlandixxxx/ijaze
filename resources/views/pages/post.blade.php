@extends('layouts.app')

@section('content')
<div class="container mt-11 text-end">
    <div class="row mx-auto">

        <!-- Sidebar: Share -->
        <div class="col-12 col-md-1 mb-3 d-flex flex-column align-items-center">
            <h6 class="mb-3">شارك</h6>
            <ul class="list-unstyled d-flex flex-md-column gap-4 gap-md-3">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-square-facebook fa-2xl text-primary"></i></a></li>
                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-square-x-twitter fa-2xl text-white"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-square-whatsapp fa-2xl text-success"></i></a></li>
                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-square-linkedin fa-2xl text-primary"></i></a></li>
                <li><a href="javascript:void(0);" onclick="copyPageLink()" title="نسخ الرابط"><i class="fa-solid fa-link fa-2xl text-white"></i></a></li>
            </ul>
        </div>

        <!-- Sidebar: Previous news -->
        <div class="col-12 col-md-3 mb-3">
            <h3>أخبار سابقة</h3>
            <ul class="list-unstyled border-top pt-2">
                @forelse($previousImages as $prev)
                    <li class="mb-2">
                        <a href="{{ route('article', $prev->slug) }}" class="d-flex justify-content-end align-items-center gap-2 text-decoration-none text-white">
                            <h5 class="mb-0 fs-6 text-truncate">{{ $prev->title }}</h5>
                            <span class="fs-6">{{ $prev->created_at->format('d-m-Y') }}</span>
                        </a>
                    </li>
                @empty
                    <p class="text-muted">لا توجد أخبار</p>
                @endforelse
            </ul>

            <h3>صوت وصورة</h3>
            <ul class="list-unstyled d-flex flex-column gap-2">
                @foreach($previousVideos as $video)
                    @php $media = $video->media->first(); @endphp
                    @if($media)
                        <li>
                            <a href="{{ route('article', $video->slug) }}" class="d-block text-decoration-none">
                                <div class="position-relative rounded overflow-hidden" style="height: 200px; width: 100%;">
                                    {{-- Thumbnail --}}
                                    <img src="{{ asset('storage/' . $media->thumbnail) }}" 
                                         class="w-100 h-100" 
                                         alt="{{ $video->title }}"
                                         style="object-fit: cover;">

                                    {{-- Title overlay --}}
                                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center p-1 small">
                                        {{ Str::limit($video->title, 50) }}
                                    </div>

                                    {{-- Play button --}}
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

        <!-- Main article -->
        <div class="col-12 col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <!-- Media -->
            @php $media = $post->media->first(); @endphp
            @if($media)
                @if(strtolower($media->type) === 'image')
<img src="{{ asset('storage/' . $media->path) }}" 
     class="img-fluid rounded mb-3" 
     alt="{{ $post->title }}"
     style="max-height:500px; width:100%; object-fit:cover;">
                @elseif(strtolower($media->type) === 'aivideo')
                    <div class="mb-3 text-center">
                        <iframe width="356" height="633" src="{{ $media->path }}"
                            title="{{ $post->title }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                @elseif(strtolower($media->type) === 'videotube')
                    <div class="mb-3 text-center">
                        <iframe src="{{ $media->path }}" class="w-100" style="height:400px;" frameborder="0" allowfullscreen></iframe>
                    </div>
                @endif
            @endif

            <!-- Author & Date -->
            <div class="d-flex justify-content-between mb-3 text-secondary">
                <span>بقلم {{ $post->author ?? 'إدارة الموقع' }}</span>
                <span>{{ $post->created_at->format('l d F Y - H:i') }} <i class="fa-regular fa-clock"></i></span>
            </div>

            <!-- Content -->
            <div class="post-content mb-3 fs-5 ">
  {!! $post->content !!}

</div>



            <!-- Tags -->
            <div class="mb-3">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tag', $tag->name) }}" class="badge bg-light text-dark me-1">{{ $tag->name }}</a>
                @endforeach
            </div>

            <!-- Related posts -->
            <div class="mt-5">
                <h3>مواضيع ذات صلة</h3>
                <div class="swiper cardSwiper">
                    <div class="swiper-wrapper" dir="rtl">
                        @foreach($relatedPosts as $related)
                            @php $relatedMedia = $related->media->first(); @endphp
                            <div class="swiper-slide" >
                                <div class="card text-bg-dark" style="aspect-ratio:9/16; border-radius:20px;">
                                    @if($relatedMedia)
                                        <img src="{{ asset('storage/' . ($relatedMedia->thumbnail ?? $relatedMedia->path)) }}" class="card-img" alt="{{ $related->title }}">
                                    @endif
                                    <div class="card-img-overlay d-flex align-items-end p-2">
                                        <h5 class="mb-0"><a href="{{ route('article', $related->slug) }}" class="text-white">{{ $related->title }}</a></h5>
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
        </div>
    </div>
</div>
@endsection
