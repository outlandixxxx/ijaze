@extends('layouts.app')
@section('content')
    <!-- Sections -->

    <section id="index" style="width:100%; padding-top: 28px;" class="mt-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($posts->chunk(5) as $chunkIndex => $chunk)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $chunkIndex }}"
                        class="{{ $chunkIndex === 0 ? 'active' : '' }}" aria-current="{{ $chunkIndex === 0 ? 'true' : '' }}"
                        aria-label="Slide {{ $chunkIndex + 1 }}">
                    </button>
                @endforeach
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner w-100">
                @foreach ($posts->chunk(5) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="container py-4">

                            <!-- First Row: 2 posts -->
                            <div class="row mb-3">
                                @foreach ($chunk->take(2) as $post)
                                    <div class="col-md-6">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="card text-white">
                                                @if ($post->media->first())
                                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                        class="card-img" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ asset('images/default.jpg') }}" class="card-img"
                                                        alt="default">
                                                @endif
                                                <div class="card-img-overlay p-2">
                                                    <h5 class="fw-bold text-white m-0">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                    @if (!empty($post->description))
                                                        <p class="card-text">
                                                            {{ \Illuminate\Support\Str::limit($post->description, 60) }}
                                                        </p>
                                                    @endif
                                                    <p class="card-text">
                                                        <small>{{ __('Last update:') }}
                                                            {{ $post->updated_at->diffForHumans() }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Second Row: 3 posts -->
                            <div class="row">
                                @foreach ($chunk->skip(2)->take(3) as $post)
                                    <div class="col-md-4">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="card text-white">
                                                @if ($post->media->first())
                                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                        class="card-img" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ asset('images/default.jpg') }}" class="card-img"
                                                        alt="default">
                                                @endif
                                                <div class="card-img-overlay p-2">
                                                    <h5 class="fw-bold text-white m-0">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                    @if (!empty($post->description))
                                                        <p class="card-text">
                                                            {{ \Illuminate\Support\Str::limit($post->description, 60) }}
                                                        </p>
                                                    @endif
                                                    <p class="card-text">
                                                        <small>{{ __('Last update:') }}
                                                            {{ $post->updated_at->diffForHumans() }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls with swapped arrows for RTL -->
            @if (app()->getLocale() == 'ar')
                <!-- Arabic RTL: Right arrow on right side, Left arrow on left side -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-circle-right fa-3x" style="color: #fcb550;"></i>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <i class="fa-solid fa-circle-left fa-3x" style="color: #fcb550;"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            @else
                <!-- English/French LTR: Left arrow on left side, Right arrow on right side -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                                        <i class="fa-solid fa-circle-left fa-3x" style="color: #fcb550;"></i>

                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <i class="fa-solid fa-circle-right fa-3x" style="color: #fcb550;"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif

        </div>
    </section>

    <section id="news" class="content-section d-flex align-items-end ">
        <div class="container-fluid px-4">
            <div id="index-title">
                <span>{{ __('News') }}</span>
            </div>
            <p class="lead fs-5">{{ __('Discover the top news') }}</p>

            <div class="swiper cardSwiper position-relative w-100">
                <div class="swiper-wrapper">
                    @foreach ($news as $post)
                        <div class="swiper-slide">
                            <div class="card card-hover h-100 text-bg-dark">
                                <div class="swiper-card-img">
                                    @if ($post->media->first())
                                        <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                            class="swiper-card-img-zoom" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="swiper-card-img-zoom"
                                            alt="default">
                                    @endif
                                </div>
                                <div class="card-img-overlay p-2">
                                    <h5 class="card-title mb-0">
                                        <a href="{{ route('article', $post->slug) }}" class="text-white">
                                            {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>


            <!-- Discover More link -->
            <div class="mt-3 text-end">
                <a href="{{ 'news' }}"
                    class="btn btn-light btn-sm fw-bold text-decoration-none">{{ __('Discover More') }}</a>
            </div>


        </div>
    </section>

    <section id="shahid" class="content-section d-flex align-items-end">
        <div class="container-fluid px-4">
            <div id="index-title">
                <span>{{ __('Watch') }}</span>
            </div>

            <p class="lead fs-5">{{ __('Discover our top videos') }}</p>

            <div class="swiper cardSwiper2 position-relative w-100">
                <div class="swiper-wrapper">
                    @foreach ($shahid as $post)
                        <div class="swiper-slide">
                            <div class="card card-hover text-bg-dark"
                                style="aspect-ratio: 9/16; height: auto; border-radius: 20px">
                                @if ($post->media->first())
                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                        class="card-img" alt="{{ $post->title }}"
                                        style="width:100%; height:100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" class="card-img"
                                        style="width:100%; height:100%; object-fit: cover;" alt="default">
                                @endif

                                <div class="card-img-overlay p-2">
                                    <h5 class="card-title mb-0">
                                        <a href="{{ route('article', $post->slug) }}" class="text-white">
                                            {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>

            <div class="mt-3">

                <div class="text-end">
                    <a href="{{ 'shahid' }}"
                        class="btn btn-light btn-sm fw-bold text-decoration-none">{{ __('Discover More') }}</a>
                </div>

            </div>

        </div>
    </section>

    <section id="sport" class="content-section d-flex align-items-end ">
        <div class="container-fluid px-4">

            <div id="index-title">
                <span>{{ __('Sports Events') }}</span>
            </div>
            <p class="lead fs-5">{{ __('Discover the top sports news') }}</p>

            <div class="swiper cardSwiper position-relative w-100">
                <div class="swiper-wrapper">
                    @foreach ($sport as $post)
                        <div class="swiper-slide">
                            <div class="card card-hover h-100 text-bg-dark">
                                <div class="swiper-card-img">
                                    @if ($post->media->first())
                                        <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                            class="swiper-card-img-zoom" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="swiper-card-img-zoom"
                                            alt="default">
                                    @endif
                                </div>
                                <div class="card-img-overlay p-2">
                                    <h5 class="card-title mb-0">
                                        <a href="{{ route('article', $post->slug) }}" class="text-white">
                                            {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Discover More link -->
            <!-- Discover More link -->

            <div class="mt-3 text-end">
                <a href="{{ 'sport' }}"
                    class="btn btn-light btn-sm fw-bold text-decoration-none">{{ __('Discover More') }}</a>
            </div>


        </div>
    </section>

    <section id="ai" class="content-section d-flex align-items-end ">
        <div class="container-fluid px-4">
            <div id="index-title">
                <span>{{ __('AI News') }}</span>
            </div>

            <p class="lead fs-5">{{ __('Stay updated with AI news') }}</p>

            <div class="swiper cardSwiper2 position-relative w-100">
                <div class="swiper-wrapper">
                    @foreach ($ainews as $post)
                        <div class="swiper-slide">
                            <div class="card card-hover text-bg-dark"
                                style="aspect-ratio: 9/16; height: auto; border-radius: 20px">
                                @if ($post->media->first())
                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                        class="card-img" alt="{{ $post->title }}"
                                        style="width:100%; height:100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" class="card-img"
                                        style="width:100%; height:100%; object-fit: cover;" alt="default">
                                @endif

                                <div class="card-img-overlay p-2">
                                    <h5 class="card-title mb-0">
                                        <a href="{{ route('article', $post->slug) }}" class="text-white">
                                            {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="mt-3">

                <div class="text-end">
                    <a href="{{ 'ai' }}"
                        class="btn btn-light btn-sm fw-bold text-decoration-none">{{ __('Discover More') }}</a>
                </div>

            </div>

        </div>
    </section>

    <section id="amusing"  style="width:100%; padding-top: 28px;" class="mt-5">

        <div class="px-4">
                <div id="index-title">
                    <span>{{ __('Diverse') }}</span>
                </div>
            </div>
            <p class="lead fs-5 px-4">{{ __('A variety of exciting news') }}</p>
        <div id="carouselvideos" class="carousel slide w-100" data-bs-ride="carousel" data-bs-wrap="true">

            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($diverse->chunk(6) as $chunkIndex => $chunk)
                    <button type="button" data-bs-target="#carouselvideos" data-bs-slide-to="{{ $chunkIndex }}"
                        class="{{ $chunkIndex == 0 ? 'active' : '' }}"
                        aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $chunkIndex + 1 }}"></button>
                @endforeach
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner w-100">
                @foreach ($diverse->chunk(6) as $chunkIndex => $postsChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="container py-4">
                            <div class="row mb-3">
                                @foreach ($postsChunk->take(3) as $post)
                                    <div class="col-md-4">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="custom-card custom-card-hover text-white">
                                                @php
                                                    $imageUrl = $post->media->first()
                                                        ? asset(
                                                            'storage/' .
                                                                ($post->media->first()->thumbnail ??
                                                                    $post->media->first()->path),
                                                        )
                                                        : asset('images/default.jpg');
                                                @endphp
                                                <div class="custom-card-img"
                                                    style="background-image: url('{{ $imageUrl }}');">
                                                </div>
                                                <div class="custom-card-overlay">
                                                    <h5 class="fw-bold text-white m-2">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach ($postsChunk->slice(3) as $post)
                                    <div class="col-md-4">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="custom-card custom-card-hover text-white">
                                                @php
                                                    $imageUrl = $post->media->first()
                                                        ? asset(
                                                            'storage/' .
                                                                ($post->media->first()->thumbnail ??
                                                                    $post->media->first()->path),
                                                        )
                                                        : asset('images/default.jpg');
                                                @endphp
                                                <div class="custom-card-img"
                                                    style="background-image: url('{{ $imageUrl }}');">
                                                </div>
                                                <div class="custom-card-overlay">
                                                    <h5 class="fw-bold text-white m-2">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls with swapped arrows for RTL -->
            @if (app()->getLocale() == 'ar')
                <!-- Arabic RTL: Right arrow on right side, Left arrow on left side -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselvideos"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-circle-right fa-3x"></i>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselvideos"
                    data-bs-slide="next">
                    <i class="fa-solid fa-circle-left fa-3x"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            @else
                <!-- English/French LTR: Left arrow on left side, Right arrow on right side -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselvideos"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-circle-left fa-3x"></i>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselvideos"
                    data-bs-slide="next">
                    <i class="fa-solid fa-circle-right fa-3x"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>

        <div class="p-3">
            <div class="text-end">
                <a href="{{ 'amusing' }}"
                    class="btn btn-light btn-sm fw-bold text-decoration-none">{{ __('Discover More') }}</a>
            </div>
        </div>

    </section>
@endsection
