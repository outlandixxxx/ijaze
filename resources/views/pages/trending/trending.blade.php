@extends('layouts.app')

@section('content')
    <div class="container mt-11">

        <ul class="nav nav-pills gap-2 justify-content-end" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill" id="amusing-tab" data-bs-toggle="tab"
                    data-bs-target="#amusing" type="button" role="tab" aria-controls="amusing"
                    aria-selected="false">ترفيه</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill" id="sport-tab" data-bs-toggle="tab"
                    data-bs-target="#sport" type="button" role="tab" aria-controls="sport"
                    aria-selected="false">رياضة</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill active" id="news-tab" data-bs-toggle="tab"
                    data-bs-target="#news" type="button" role="tab" aria-controls="news"
                    aria-selected="true">اخبار</button>
            </li>

        </ul>
        <div class="tab-content mt-3" id="myTabContent">


            <div class="tab-pane fade show active " id="news" role="tabpanel" aria-labelledby="news-tab">


                <div class="container my-4 justify-content-end text-end">

                    <h3 class="mb-3 mt-3">فيديوهات <i class="fa-solid fa-circle-play fa-xl" style="color: #63E6BE;"></i>
                    </h3>
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">


                        @for ($i = 1; $i <= 30; $i++)
                            <div class="col card-item d-none">
                                <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">

                                    <div class="card h-100 small-video position-relative"
                                        data-video="{{ asset('images/videos/video1.mp4') }}"
                                        data-title="فيديو {{ $i }}">
                                        <img src="{{ asset('images/videos/video1.png') }}" class="card-img"
                                            alt="Video {{ $i }}"
                                            style="width:100%; aspect-ratio:16/9; object-fit:cover; border-radius:0.5rem;">

                                        <!-- Play button overlay -->
                                        <div class="play-button position-absolute top-50 start-50 translate-middle">
                                            <i class="bi bi-play-circle-fill" style="font-size: 3rem; color: white;"></i>
                                        </div>
                                    </div>

                                    <div class="text-center p-2" style="background: transparent; color: black;">
                                        <h6 class=" mb-0">فيديو {{ $i }}</h6>
                                    </div>

                                </div>
                            </div>
                        @endfor
                    </div>

                    {{-- Show more button --}}
                    <div class="text-center mt-3">
                        <button id="showMoreBtn" class="btn btn-dark px-4">عرض المزيد</button>
                    </div>
                </div>






                <div class="row mt-3 justify-content-end text-end" id="card-container-written ">
                    <h3 class="mt-3 mb-3">مكتوبة <i class="fa-solid fa-newspaper fa-xl" style="color: #63E6BE;"></i></h3>


                    {{--                   <div class="card text-white text-end border border-white bg-transparent">
                        <div class="card-body">

                            <!-- Example with more than 10 items -->
                            @for ($i = 1; $i <= 30; $i++)
                                <a href="#" style=" text-decoration: none; color: white;">
                                    <p class="card-text-end news-item d-none">خبر {{ $i }}</p>
                                </a>
                            @endfor

                            <div class="text-center mt-3">
                                <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>

                            </div>
                        </div>
                    </div> --}}


                    <div class="container my-4">
                        <div class="card-body"> <!-- Wrap all news items here -->

                            @for ($i = 1; $i <= 30; $i++)
                                <div class="card text-white d-flex flex-row-reverse align-items-center news-item d-none"
                                     style="background-color: black; border: none; border-radius: 15px; overflow: hidden; padding: 10px;">

                                    <!-- Small Image (right side) -->
                                    <div style="flex-shrink: 0;">
                                        <img src="{{ asset('images/documentary/card1.png') }}"
                                             alt="صورة"
                                             style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">
                                    </div>

                                    <!-- Text (left side) -->
                                    <div class="card-body text-end ms-2 p-0">
                                        <h5 class="card-title m-3" style="color: white;">هذا عنوان الفيديو {{ $i }}</h5>
                                        <p class="card-text m-3" style="color: #ccc;">وصف قصير للفيديو أو تفاصيل أخرى هنا</p>
                                    </div>

                                </div>
                            @endfor

                            <div class="text-center mt-3">
                                <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                            </div>

                        </div>
                    </div>



                </div>


            </div>


        </div>
    </div>

    <div class="tab-pane fade" id="sport" role="tabpanel" aria-labelledby="sport-tab">...</div>
    <div class="tab-pane fade" id="amusing" role="tabpanel" aria-labelledby="amusing-tab">...</div>
    </div>


    </div>
@endsection
