@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h3 class="card-title mb-3" style="color: #ad9884;"> مشاهير <i class="fa-solid fa-people-group fa-xl"></i>
                        </h3>

                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container"
                            >

                            <!-- Example with more than 10 items -->
                            @for ($i = 1; $i <= 30; $i++)
                                <div class="col card-item d-none">
                                    <div class="card bg-dark text-white card-equal">
                                        <img src="https://picsum.photos/600/400?random=1" class="card-img" alt="...">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <h5 class="card-title">Card title 1</h5>
                                            <p class="card-text">This is a wider card with supporting text.</p>
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



        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h3 class="card-title mb-3" style="color: #ad9884;"> حياتي <i class="fa-solid fa-people-group fa-xl"></i>
                        </h3>
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container"
                            >

                            <!-- Example with more than 10 items -->
                            @for ($i = 1; $i <= 30; $i++)
                                <div class="col card-item d-none">
                                    <div class="card bg-dark text-white card-equal">
                                        <img src="https://picsum.photos/600/400?random=1" class="card-img" alt="...">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <h5 class="card-title">Card title 1</h5>
                                            <p class="card-text">This is a wider card with supporting text.</p>
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


        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h3 class="card-title mb-3" style="color: #ad9884;"> مغربي <i class="fa-solid fa-people-group fa-xl"></i>
                        </h3>
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container"
                            >

                            <!-- Example with more than 10 items -->
                            @for ($i = 1; $i <= 30; $i++)
                                <div class="col card-item d-none">
                                    <div class="card bg-dark text-white card-equal">
                                        <img src="https://picsum.photos/600/400?random=1" class="card-img" alt="...">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <h5 class="card-title">Card title 1</h5>
                                            <p class="card-text">This is a wider card with supporting text.</p>
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

        <div class="row p-4">
                <div class="col-sm-12">
                    <div class="card text-white text-end  bg-transparent">
                        <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                            <h3 class="card-title mb-3" style="color: #ad9884;"> صحتي <i class="fa-solid fa-heart-pulse fa-xl"></i></i>
                            </h3>

                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container"
                               >

                                <!-- Example with more than 10 items -->
                                @for ($i = 1; $i <= 30; $i++)
                                    <div class="col card-item d-none">
                                        <div class="card bg-dark text-white card-equal">
                                            <img src="https://picsum.photos/600/400?random=1" class="card-img" alt="...">
                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <h5 class="card-title">Card title 1</h5>
                                                <p class="card-text">This is a wider card with supporting text.</p>
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
@endsection
