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



 <div class="container my-4 text-end">

    <h3 class="mb-3 mt-3">فيديوهات
        <i class="fa-solid fa-circle-play fa-xl" style="color: #fefffe;"></i>
    </h3>


    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3">


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

      {{-- Show more button --}}
          <div class="text-center mt-3">
                <button  class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
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
