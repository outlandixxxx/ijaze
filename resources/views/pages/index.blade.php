@extends('layouts.app')
@section('content')

    <!-- Sections -->

    <section id="section1" style="width:100%; padding-top: 28px;">
        <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel" data-bs-wrap="true">

            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner w-100">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel/1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/4.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fourth slide label</h5>
                        <p>Some representative placeholder content for the fourth slide.</p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="font: 800"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" style="font: 800"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </section>




    <section id="section2" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">اخبار عاجلة</h2>
            <p class="lead fs-5">اكتشف ابرز الاخبار العاجلة </p>

            <div class="swiper cardSwiper position-relative w-100">

                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 2">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card4.png') }}" class="card-img" alt="Card 4">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card5.png') }}" class="card-img" alt="Card 5">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Add more cards similarly -->
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Discover More link -->
            <div class="mt-3 text-start">
                <a href="{{ 'breakingnews' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>



    <section id="section3" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">تراندين</h2>
            <p class="lead fs-5">اكتشف الاكثر مشاهدة</p>

            <div class="swiper cardSwiper2 position-relative w-100">

                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>


                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 2"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card4.png') }}" class="card-img" alt="Card 4"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card5.png') }}" class="card-img" alt="Card 5"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Add more cards similarly -->
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="mt-3 text-start">
                <a href="#" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="section4" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">احداث رياضية</h2>
            <p class="lead fs-5">اكتشف ابرز الاخبار المتعلقة بالمجال الرياضي</p>

            <div class="swiper cardSwiper position-relative w-100">

                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 2">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card4.png') }}" class="card-img" alt="Card 4">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card5.png') }}" class="card-img" alt="Card 5">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="swiper-slide">
                        <div class="card h-100 text-bg-dark">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Add more cards similarly -->
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Discover More link -->
            <div class="mt-3 text-start">
                <a href="#" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="section5" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">AI اخبار</h2>
            <p class="lead fs-5">كن على اطلاع باخبار متقنة بالذكاء الاصطناعي</p>

            <div class="swiper cardSwiper2 position-relative w-100">

                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>


                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 2"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card4.png') }}" class="card-img" alt="Card 4"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card5.png') }}" class="card-img" alt="Card 5"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark"
                            style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Add more cards similarly -->
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination dots -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="mt-3 text-start">
                <a href="#" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>

    <section id="section6" class="py-5">
        <div class="container-fluid">
            <h2 class="text-center mb-4">قسم الفيديوهات</h2>
            <div class="row g-3">

                <!-- Featured video -->
                <div class="col-lg-6 col-md-12">
                    <div class="card position-relative">
                        <video id="featured-video" class="w-100" autoplay muted loop playsinline
                            style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">
                            <source src="{{ asset('images/videos/video1.mp4') }}" type="video/mp4">
                        </video>
                        <div class="card-img-overlay d-flex align-items-end">
                            <h5 id="featured-title" class="card-title bg-dark bg-opacity-50 p-2 rounded text-white">
                                فيديو 1</h5>
                        </div>
                    </div>
                </div>

                <!-- Small video thumbnails -->
                <div class="col-lg-3 col-md-12">
                    <div class="row g-3">

                        <div class="col-12">
                            <div class="card h-100 small-video" data-video="{{ asset('images/videos/video1.mp4') }}"
                                data-title="فيديو 1">
                                <img src="{{ asset('images/videos/video1.png') }}" class="card-img" alt="Video 1"
                                    style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card h-100 small-video" data-video="{{ asset('images/videos/video2.mp4') }}"
                                data-title="فيديو 2">
                                <img src="{{ asset('images/videos/video2.png') }}" class="card-img" alt="Video 2"
                                    style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="row g-3">

                        <div class="col-12">
                            <div class="card h-100 small-video" data-video="{{ asset('images/videos/video1.mp4') }}"
                                data-title="فيديو 1">
                                <img src="{{ asset('images/videos/video1.png') }}" class="card-img" alt="Video 1"
                                    style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card h-100 small-video" data-video="{{ asset('images/videos/video2.mp4') }}"
                                data-title="فيديو 2">
                                <img src="{{ asset('images/videos/video2.png') }}" class="card-img" alt="Video 2"
                                    style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="mt-3 text-start">
                <a href="#" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <script>
        const featuredVideo = document.getElementById('featured-video');
        const featuredTitle = document.getElementById('featured-title');
        const smallVideos = document.querySelectorAll('.small-video');

        let index = 0;

        function swapVideo() {
            const video = smallVideos[index];
            const src = video.getAttribute('data-video');
            featuredVideo.src = src;
            featuredVideo.load();
            featuredVideo.play();
            featuredTitle.textContent = video.getAttribute('data-title');
            index = (index + 1) % smallVideos.length;
        }

        // Auto-swap every 8 seconds
        let swapInterval = setInterval(swapVideo, 8000);

        // Add click event to all small videos
        smallVideos.forEach(video => {
            video.addEventListener('click', () => {
                const src = video.getAttribute('data-video');
                const title = video.getAttribute('data-title');
                featuredVideo.src = src;
                featuredVideo.load();
                featuredVideo.play();
                featuredTitle.textContent = title;

                // Reset auto-swap timer so it doesn't immediately change
                clearInterval(swapInterval);
                swapInterval = setInterval(swapVideo, 8000);
            });
        });
    </script>
@endsection