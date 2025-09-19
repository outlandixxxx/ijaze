@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <div class="row p-4">
            <div class="col-sm-6">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h5 class="card-title mb-3" style="color: #83b83f;">كرة قدم <i class="fa-solid fa-futbol fa-xl"
                                style="color: #ffffff;"></i>
                        </h5>

                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                        <a href="{{ 'imagenews' }}" class="text-decoration-none">
                            <div class="card text-white d-flex flex-row-reverse align-items-center news-item d-none mt-1"
                                style="background-color: black; border: none; border-radius: 15px; overflow: hidden; padding: 5px; cursor: pointer;">

                                <!-- Small Image (right side) -->
                                <div style="flex-shrink: 0;">
                                    <img src="{{ asset('images/documentary/card1.png') }}" alt="صورة"
                                        style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">
                                </div>

                                <!-- Text (left side) -->
                                <div class="card-body text-end ms-2 p-0">
                                    <h6 class="card-title m-3" style="color: white;">هذا عنوان الفيديو {{ $i }}</h6>
                                    <p class="card-text m-3" style="color: #ccc;">وصف قصير للفيديو أو تفاصيل أخرى هنا</p>
                                </div>

                            </div>
                        </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h5 class="card-title mb-3" style="color: #83b83f;">كرة سلة <i class="fa-solid fa-basketball fa-xl"
                                style="color: #f52c2c;"></i></h5>
                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                        <a href="{{ 'imagenews' }}" class="text-decoration-none">
                            <div class="card text-white d-flex flex-row-reverse align-items-center news-item d-none mt-1"
                                style="background-color: black; border: none; border-radius: 15px; overflow: hidden; padding: 5px;">

                                <!-- Small Image (right side) -->
                                <div style="flex-shrink: 0;">
                                    <img src="{{ asset('images/documentary/card1.png') }}" alt="صورة"
                                        style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">
                                </div>

                                <!-- Text (left side) -->
                                <div class="card-body text-end ms-2 p-0">
                                    <h6 class="card-title m-3" style="color: white;">هذا عنوان الفيديو {{ $i }}
                                    </h6>
                                    <p class="card-text m-3" style="color: #ccc;">وصف قصير للفيديو أو تفاصيل أخرى هنا</p>
                                </div>

                            </div>
                        </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-sm-6">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h5 class="card-title mb-3" style="color: #83b83f;"> رياضات اخرى <i class="fa-solid fa-plus fa-xl"
                                style="color: #f9f3dc;"></i></h5>
                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                        <a href="{{ 'imagenews' }}" class="text-decoration-none">
                            <div class="card text-white d-flex flex-row-reverse align-items-center news-item d-none mt-1"
                                style="background-color: black; border: none; border-radius: 15px; overflow: hidden; padding: 5px;">

                                <!-- Small Image (right side) -->
                                <div style="flex-shrink: 0;">
                                    <img src="{{ asset('images/documentary/card1.png') }}" alt="صورة"
                                        style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">
                                </div>

                                <!-- Text (left side) -->
                                <div class="card-body text-end ms-2 p-0">
                                    <h6 class="card-title m-3" style="color: white;">هذا عنوان الفيديو {{ $i }}
                                    </h6>
                                    <p class="card-text m-3" style="color: #ccc;">وصف قصير للفيديو أو تفاصيل أخرى هنا</p>
                                </div>

                            </div>
                        </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h5 class="card-title mb-3" style="color: #83b83f;"> تنس <i
                                class="fa-solid fa-table-tennis-paddle-ball fa-xl" style="color: #98fc4b;"></i></h5>

                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                        <a href="{{ 'imagenews' }}" class="text-decoration-none">
                            <div class="card text-white d-flex flex-row-reverse align-items-center news-item d-none mt-1"
                                style="background-color: black; border: none; border-radius: 15px; overflow: hidden; padding: 5px;">

                                <!-- Small Image (right side) -->
                                <div style="flex-shrink: 0;">
                                    <img src="{{ asset('images/documentary/card1.png') }}" alt="صورة"
                                        style="width:100px; height:100px; object-fit:cover; border-radius: 5px;">
                                </div>

                                <!-- Text (left side) -->
                                <div class="card-body text-end ms-2 p-0">
                                    <h6 class="card-title m-3" style="color: white;">هذا عنوان الفيديو {{ $i }}
                                    </h6>
                                    <p class="card-text m-3" style="color: #ccc;">وصف قصير للفيديو أو تفاصيل أخرى هنا</p>
                                </div>

                            </div>
                            </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
