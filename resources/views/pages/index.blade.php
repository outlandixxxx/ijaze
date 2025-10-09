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
            <div class="carousel-inner w-100" dir="rtl">
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
                                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2">
                                                    <h5 class="fw-bold text-white m-0">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                    @if (!empty($post->description))
                                                        <p class="card-text">
                                                            {{ \Illuminate\Support\Str::limit($post->description, 60) }}
                                                        </p>
                                                    @endif
                                                    <p class="card-text"><small>اخر تحديث:
                                                            {{ $post->updated_at->diffForHumans() }}</small></p>
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
                                                <div class="card-img-overlay d-flex flex-column justify-content-end p-2">
                                                    <h5 class="fw-bold text-white m-0">
                                                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                                    @if (!empty($post->description))
                                                        <p class="card-text">
                                                            {{ \Illuminate\Support\Str::limit($post->description, 60) }}
                                                        </p>
                                                    @endif
                                                    <p class="card-text"><small>اخر تحديث:
                                                            {{ $post->updated_at->diffForHumans() }}</small></p>
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

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <i class="fa-solid fa-circle-left fa-3x" style="color: #fcb550;"></i>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <i class="fa-solid fa-circle-right fa-3x" style="color: #FCB550;"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>




    <section id="news" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h1 class="mb-3">اخبار</h1>
            <p class="lead fs-5">اكتشف ابرز الاخبار </p>

            <div class="swiper cardSwiper position-relative w-100 " dir="rtl">

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
                                <div class="card-img-overlay d-flex align-items-end p-2">
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
            <div class="mt-3 text-start">
                <a href="{{ 'news' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>



    <section id="shahid" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h1 class="mb-3">شاهد</h1>
            <p class="lead fs-5">اكتشف ابرز فيديوهاتنا</p>





<div class="swiper cardSwiper2 position-relative w-100" dir="rtl">

                <div class="swiper-wrapper">






                        @foreach ($shahid as $post)

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card card-hover text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                             @if ($post->media->first())
                            <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}" class="card-img" alt="{{ $post->title }}"
                                style="width:100%; height:100%; object-fit: cover;">
                            @else
                                        <img src="{{ asset('images/default.jpg') }}" class="card-img" style="width:100%; height:100%; object-fit: cover;"
                                            alt="default">
                                    @endif

                            <div class="card-img-overlay d-flex align-items-end p-2">
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
            <div class="mt-3 text-start">
                <a href="{{ 'shahid' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="sport" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h1 class="mb-3">احداث رياضية</h1>
            <p class="lead fs-5">اكتشف ابرز الاخبار المتعلقة بالمجال الرياضي</p>

            <div class="swiper cardSwiper position-relative w-100" dir="rtl">

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
                                <div class="card-img-overlay d-flex align-items-end p-2">
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
            <div class="mt-3 text-start">
                <a href="{{ 'sport' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="ai" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h1 class="mb-3">AI اخبار</h1>
            <p class="lead fs-5">كن على اطلاع باخبار متقنة بالذكاء الاصطناعي</p>

            <div class="swiper cardSwiper2 position-relative w-100" dir="rtl">


                <div class="swiper-wrapper">

                    
        @foreach ($ainews as $post)

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card card-hover text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                             @if ($post->media->first())
                            <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}" class="card-img" alt="{{ $post->title }}"
                                style="width:100%; height:100%; object-fit: cover;">
                            @else
                                        <img src="{{ asset('images/default.jpg') }}" class="card-img" style="width:100%; height:100%; object-fit: cover;"
                                            alt="default">
                                    @endif

                            <div class="card-img-overlay d-flex align-items-end p-2">
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
            <div class="mt-3 text-start">
                <a href="{{ 'ai' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


   <section id="amusing" class="mt-5" style="width:100%; padding-top:28px;">
    <div id="carouselvideos" class="carousel slide w-100" data-bs-ride="carousel" data-bs-wrap="true">
        <h1 class="mb-3 px-4 text-end">منوعات</h1>
        <p class="lead fs-5 px-4 text-end">باقة من الأخبار المتنوعة ى المشوقة</p>

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($diverse->chunk(6) as $chunkIndex => $chunk)
                <button type="button" data-bs-target="#carouselvideos" data-bs-slide-to="{{ $chunkIndex }}"
                    class="{{ $chunkIndex == 0 ? 'active' : '' }}" aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $chunkIndex + 1 }}"></button>
            @endforeach
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner w-100" dir="rtl">
            @foreach($diverse->chunk(6) as $chunkIndex => $postsChunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="container py-4">
                        <div class="row mb-3">
                            @foreach($postsChunk->take(3) as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                        <div class="custom-card custom-card-hover text-white">
                                            <div class="custom-card-img" style="background-image: url('{{ $post->media->first()?->path ? asset('storage/'.($post->media->first()->thumbnail ?? $post->media->first()->path)) : asset('images/default.jpg') }}');"></div>
                                            <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                                <h5 class="fw-bold text-white text-end m-2">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach($postsChunk->slice(3) as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                        <div class="custom-card custom-card-hover text-white">
                                            <div class="custom-card-img" style="background-image: url('{{ $post->media->first()?->path ? asset('storage/'.$post->media->first()->path) : asset('images/default.jpg') }}');"></div>
                                            <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                                <h5 class="fw-bold text-white  m-2">{{ \Illuminate\Support\Str::limit($post->title, 40) }}</h5>
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

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselvideos" data-bs-slide="prev">
            <i class="fa-solid fa-circle-left fa-3x" style="color: #fcb550;"></i>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselvideos" data-bs-slide="next">
            <i class="fa-solid fa-circle-right fa-3x" style="color: #FCB550;"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="p-3 text-start">
        <a href="{{ 'amusing' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
    </div>
</section>

@endsection
