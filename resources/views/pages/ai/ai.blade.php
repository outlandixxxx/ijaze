@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11 p-4">

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


                {{--  <div class="container-fluid my-4 justify-content-end text-end p-4">
                    <h3 class="mb-3 mt-3">فيديوهات
                        <i class="fa-solid fa-circle-play fa-xl" style="color: #63E6BE;"></i>
                    </h3>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">

                        @for ($i = 1; $i <= 30; $i++)
                            <div class="col card-item d-none">
                                <div class="video-card h-100 border-0 shadow-sm">

                                    <div class="small-video position-relative video-wrapper"
                                         data-video="{{ asset('images/videos/video1.mp4') }}"
                                         data-title="فيديو {{ $i }}">
                                        <img src="{{ asset('images/videos/video1.png') }}"
                                             class="video-card-img"
                                             alt="Video {{ $i }}">

                                        <!-- Play button overlay -->
                                        <div class="play-button position-absolute top-50 start-50 translate-middle">
                                            <i class="bi bi-play-circle-fill" style="font-size: 3rem; color: white;"></i>
                                        </div>
                                    </div>

                                    <div class="text-center p-2" style="background: transparent; color: black;">
                                        <h6 class="mb-0">فيديو {{ $i }}</h6>
                                    </div>

                                </div>
                            </div>
                        @endfor
                    </div>

                    <div class="text-center mt-3">
                        <button id="showMoreBtn" class="btn btn-dark px-4">عرض المزيد</button>
                    </div>
                </div>
 --}}


 <div class="container-fluid my-4 text-end">

    <h3 class="mb-3 mt-3">فيديوهات
        <i class="fa-solid fa-circle-play fa-xl" style="color: #63E6BE;"></i>
    </h3>

    <!-- Featured video -->
    <div id="featuredVideo" class="mb-4">
        <p style="color:#ccc;">اختر فيديو للعرض هنا</p>
    </div>

    <!-- Video grid -->
    <div class="row gx-4 gy-5" id="videoGrid">
        @for ($i = 1; $i <= 30; $i++)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 card-item d-none">
                <div class="video-card small-video position-relative"
                     data-video="{{ asset('images/videos/video1.mp4') }}"
                     data-title="فيديو {{ $i }}">
                    <img src="{{ asset('images/videos/video1.png') }}"
                         class="video-card-img"
                         alt="Video {{ $i }}">
                    <div class="play-button position-absolute top-50 start-50 translate-middle">
                        <i class="bi bi-play-circle-fill" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <div class="text-center p-1">
                        <h6 class="mb-0" style="color:black;">فيديو {{ $i }}</h6>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <div class="text-center mt-3">
        <button id="showMoreBtn" class="btn btn-dark px-4">عرض المزيد</button>
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
