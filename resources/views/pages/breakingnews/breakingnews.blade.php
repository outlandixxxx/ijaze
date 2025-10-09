@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">



       <!-- Custom Tabs Navigation -->
<div class="custom-tabs-container mt-4">
    <ul class="custom-tabs " style="z-index: 99;">
        <li class="custom-tab-item active" data-target="politic"><a href="javascript:void(0)">السياسة</a></li>
        <li class="custom-tab-item" data-target="society"><a href="javascript:void(0)">المجتمع</a></li>
        <li class="custom-tab-item" data-target="technology"><a href="javascript:void(0)">التكنولوجيا</a></li>
        <li class="custom-tab-item" data-target="world"><a href="javascript:void(0)">العالم</a></li>
        <li class="custom-tab-item" data-target="diverse"><a href="javascript:void(0)">متنوع</a></li>
    </ul>
</div>

<!-- Tab Content -->
<div class="custom-tab-content">
    <div class="tab-pane active" id="politic">


        
@include('pages.components.carousel')



        <!-- Your "الاكثر مشاهدة" Swiper content -->
        @include('pages.components.swipper2')

          <div class="container px-4 text-end" >
            <h3 class="mb-3">جميع المقالات</h3>
                <div class="row p-4">
                    <div class="col-sm-12">
                        <div class="card text-white text-end  bg-transparent">
                            <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">

                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">

                                    <!-- Example with more than 10 items -->
                                    @for ($i = 1; $i <= 30; $i++)
                                        <div class="col card-item d-none">
                                            
                                             <div class="swiper-slide">
                        <div class="card text-bg-dark card-equal card-hover">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/documentary/card'.$i.'.png') }}" class="card-img" alt="Card {{ $i }}">
                            </div>
                            <div class="card-img-overlay d-flex align-items-end p-2">
                                <h5 class="card-title mb-0">
                                    <a href="#" class="text-white">عنوان الخبر {{ $i }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="tab-pane" id="society">... المحتوى هنا ...</div>
    <div class="tab-pane" id="technology">... المحتوى هنا ...</div>
    <div class="tab-pane" id="world">... المحتوى هنا ...</div>
    <div class="tab-pane" id="diverse">... المحتوى هنا ...</div>
</div>



    </div>
@endsection
