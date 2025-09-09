@extends('layouts.app')

@section('content')
    <div class="container-xl mt-11">

        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white text-end border border-white bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title mb-3">كرة قدم <i class="fa-solid fa-futbol fa-xl" style="color: #ffffff;"></i>
                        </h5>

                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="#" style=" text-decoration: none; color: white;">
                                <p class="card-text-end news-item d-none">خبر {{ $i }}</p>
                            </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-sm btn-light show-more-btn">المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white text-end border border-white bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title mb-3">كرة سلة <i class="fa-solid fa-basketball fa-xl"
                                style="color: #f52c2c;"></i></h5>
                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="#" style=" text-decoration: none; color: white;">
                                <p class="card-text-end news-item d-none">خبر {{ $i }}</p>
                            </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-sm btn-light show-more-btn">المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="card text-white text-end border border-white bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title mb-3 mb-3"> رياضات اخرى <i class="fa-solid fa-plus fa-xl"
                                style="color: #f9f3dc;"></i></h5>
                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="#" style=" text-decoration: none; color: white;">
                                <p class="card-text-end news-item d-none">خبر {{ $i }}</p>
                            </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-sm btn-light show-more-btn">المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white text-end border border-white bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title mb-3"> تنس <i class="fa-solid fa-table-tennis-paddle-ball fa-xl"
                                style="color: #98fc4b;"></i></h5>

                        <!-- Example with more than 10 items -->
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="#" style=" text-decoration: none; color: white;">
                                <p class="card-text-end news-item d-none">خبر {{ $i }}</p>
                            </a>
                        @endfor

                        <div class="text-center mt-3">
                            <button class="btn btn-sm btn-light show-more-btn">المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
