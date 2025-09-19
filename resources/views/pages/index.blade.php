@extends('layouts.app')
@section('content')
    <!-- Sections -->




        <section id="index" style="width:100%; padding-top: 28px;" class="mt-5">
            <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel" data-bs-wrap="true">
                <!-- Indicators -->
                <div class="carousel-indicators"> <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <button
                        type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button> <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="2" aria-label="Slide 3"></button> <button type="button"
                        data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button> </div>
                <!-- Carousel Items -->
                <div class="carousel-inner w-100"> <!-- Carousel Item 1 -->
                    <div class="carousel-item active">
                        <div class="container py-4"> <!-- Row 1 (2 cards) -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <a href="{{ 'imagenews' }}" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">


                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ 'imagenews' }}" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                                <p class="card-text">ت نفسه دعمت عدم تدخل تقنية الفيديو، معتبرة أن الحالة لم تكن خطأ واضحا وفادحا.</p>
                                                <p class="card-text"><small>اخر تحديث قبل 3 دقائق</small></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> <!-- Row 2 (3 cards) -->
                            <div class="row">
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container py-4"> <!-- Row 1 (2 cards) -->
                            <div class="row mb-3">
                                <div class="col-md-6"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                                <div class="col-md-6"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                            </div> <!-- Row 2 (3 cards) -->
                            <div class="row">
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                                <div class="col-md-4"> <a href="" class="text-decoration-none">
                                        <div class="card text-white"> <img src="{{ asset('images/carousel/2.jpg') }}"
                                                class="card-img" alt="قطاعات الصناعة">
                                            <div class="card-img-overlay d-flex align-items-end justify-content-end p-2">
                                                <h5 class="fw-bold text-white m-0">قطاعات الصناعة</h5>
                                            </div>
                                        </div>
                                    </a> </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- <div class="carousel-inner w-100"> <div class="carousel-item active"> <img src="{{ asset('images/carousel/1.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h3>الخبر الاول</h3> <a href="{{ 'imagenews' }}" style=' color: #ffffff; text-decoration: none;'> <h5> تسجّل الآن لحضور المؤتمر الدولي العاشر ليونيكود (Unicode Conference)، الذي سيعقد في 10-12 آذار 1997 بمدينة مَايِنْتْس </h5> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/2.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5> قطاعات الصناعة</h5> <a href=""> <p>افة قطاعات الصناعة على الشبكة العالمية انترنيت ويونيكود، حيث ستتم، على الصعيدين الدولي والمحلي</p> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/3.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5>تصميم النصوص والحوسبة متعددة اللغات.</h5> <a href=""> <p>تَتَحَدَّث اَلْأَبْيَات عَنْ لَحْظَة وَدَاع يَسْتَغْرِب فِيهَا اَلشَّاعِر أَنْ لَا يَبْكِي مِنْ أَلَم اَلْفِرَاق</p> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/4.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5> اَلتَّعْبِير عَنْهُ بِالْكَلَامِ</h5> <a href=""> <p>وَيُقَسِّم فِي آخَر اَلْأَبْيَات عَلَى أَنَّ تَوَقُّف دَمْعه لَا يَعْنِي نِهَايَة حَيّه</p> </a> </div> </div> </div> --}} <!-- Controls -->

                    <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="font: 800 ; color :#fcb550 !important;"> <span
                        class="carousel-control-prev-icon" style="font: 800 ; color :#fcb550 ;"></span> <span
                        class="visually-hidden">Previous</span> </button>

                    <button class="carousel-control-next"
                    type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"> <span
                        class="carousel-control-next-icon" style="font: 800 color :#fcb550 !important "></span> <span
                        class="visually-hidden">Next</span> </button>
            </div>

            <div class="p-3 text-start">
                <a href="{{ 'ai' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </section>




    <section id="breakingnews" class="content-section d-flex align-items-end justify-content-end mt-8">
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



    <section id="trending" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">تراندين</h2>
            <p class="lead fs-5">اكتشف الاكثر مشاهدة</p>





            <div class="swiper cardSwiper2 position-relative w-100">

                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3"
                                style="height:100%; object-fit:cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                     <!-- Card 1 -->
                     <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                     <!-- Card 1 -->
                     <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                     <!-- Card 1 -->
                     <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                     <!-- Card 1 -->
                     <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1"
                                style="width:100%; height:100%; object-fit: cover;">
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">الغضنفر المقاتل</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                <a href="{{ 'trending' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="sport" class="content-section d-flex align-items-end justify-content-end mt-8">
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
                <a href="{{ 'sport' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="ai" class="content-section d-flex align-items-end justify-content-end mt-8">
        <div class="container-fluid px-4 text-end">
            <h2 class="mb-3">AI اخبار</h2>
            <p class="lead fs-5">كن على اطلاع باخبار متقنة بالذكاء الاصطناعي</p>

            <div class="swiper cardSwiper2 position-relative w-100">


                <div class="swiper-wrapper">

                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                        <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
                            <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6"
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
    <div class="card text-bg-dark" style="aspect-ratio: 9/16; height: auto;     border-radius: 20px">
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
                <a href="{{ 'ai' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
            </div>
        </div>
    </section>


    <section id="amusing" style="width:100%; padding-top: 28px;" class="mt-5">
        <div id="carouselvideos" class="carousel slide w-100" data-bs-ride="carousel" data-bs-wrap="true">
            <!-- Indicators -->
            <div class="carousel-indicators"> <button type="button" data-bs-target="#carouselvideos"
                    data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <button
                    type="button" data-bs-target="#carouselvideos" data-bs-slide-to="1"
                    aria-label="Slide 2"></button> <button type="button" data-bs-target="#carouselvideos"
                    data-bs-slide-to="2" aria-label="Slide 3"></button> <button type="button"
                    data-bs-target="#carouselvideos" data-bs-slide-to="3" aria-label="Slide 4"></button> </div>
            <!-- Carousel Items -->
            <div class="carousel-inner w-100"> <!-- Carousel Item 1 -->
                <div class="carousel-item active">
                    <div class="container py-4"> <!-- Row 1 (2 cards) -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                        </div> <!-- Row 2 (3 cards) -->
                        <div class="row">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item ">
                    <div class="container py-4"> <!-- Row 1 (2 cards) -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                        </div> <!-- Row 2 (3 cards) -->
                        <div class="row">
                            <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4">
                                <a href="" class="text-decoration-none">
                                  <div class="custom-card text-white">
                                    <div class="custom-card-img" style="background-image: url('{{ asset('images/carousel/2.jpg') }}');"></div>
                                    <div class="custom-card-overlay d-flex align-items-end justify-content-end">
                                      <h5 class="fw-bold text-white text-end m-2">قطاعات الصناعة</h5>
                                    </div>
                                  </div>
                                </a>
                              </div>
                        </div>
                    </div>
                </div>
            </div> {{-- <div class="carousel-inner w-100"> <div class="carousel-item active"> <img src="{{ asset('images/carousel/1.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h3>الخبر الاول</h3> <a href="{{ 'imagenews' }}" style=' color: #ffffff; text-decoration: none;'> <h5> تسجّل الآن لحضور المؤتمر الدولي العاشر ليونيكود (Unicode Conference)، الذي سيعقد في 10-12 آذار 1997 بمدينة مَايِنْتْس </h5> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/2.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5> قطاعات الصناعة</h5> <a href=""> <p>افة قطاعات الصناعة على الشبكة العالمية انترنيت ويونيكود، حيث ستتم، على الصعيدين الدولي والمحلي</p> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/3.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5>تصميم النصوص والحوسبة متعددة اللغات.</h5> <a href=""> <p>تَتَحَدَّث اَلْأَبْيَات عَنْ لَحْظَة وَدَاع يَسْتَغْرِب فِيهَا اَلشَّاعِر أَنْ لَا يَبْكِي مِنْ أَلَم اَلْفِرَاق</p> </a> </div> </div> <div class="carousel-item"> <img src="{{ asset('images/carousel/4.jpg') }}" class="d-block w-100" alt="..."> <div class="carousel-caption d-none d-md-block"> <h5> اَلتَّعْبِير عَنْهُ بِالْكَلَامِ</h5> <a href=""> <p>وَيُقَسِّم فِي آخَر اَلْأَبْيَات عَلَى أَنَّ تَوَقُّف دَمْعه لَا يَعْنِي نِهَايَة حَيّه</p> </a> </div> </div> </div> --}} <!-- Controls --> <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselvideos" data-bs-slide="prev"> <span
                    class="carousel-control-prev-icon" style="font: 800"></span> <span
                    class="visually-hidden">Previous</span> </button> <button class="carousel-control-next"
                type="button" data-bs-target="#carouselvideos" data-bs-slide="next"> <span
                    class="carousel-control-next-icon" style="font: 800"></span> <span
                    class="visually-hidden">Next</span> </button>
        </div>

        <div class="p-3 text-start">
            <a href="{{ 'amusing' }}" class="btn btn-light fw-bold text-decoration-none">اكتشف اكثر</a>
        </div>
    </section>


@endsection
