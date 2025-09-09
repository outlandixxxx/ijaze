@extends('layouts.app')

@section('content')
    <div class="container mt-11">

        <ul class="nav nav-pills gap-2 justify-content-end" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill " id="diverse-tab" data-bs-toggle="tab"
                    data-bs-target="#diverse" type="button" role="tab" aria-controls="diverse"
                    aria-selected="false">متنوعة</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill" id="world-tab" data-bs-toggle="tab"
                    data-bs-target="#world" type="button" role="tab" aria-controls="world"
                    aria-selected="false">العالم</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill" id="technology-tab" data-bs-toggle="tab"
                    data-bs-target="#technology" type="button" role="tab" aria-controls="technology"
                    aria-selected="false">تكنلوجيا</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill" id="society-tab" data-bs-toggle="tab"
                    data-bs-target="#society" type="button" role="tab" aria-controls="society"
                    aria-selected="false">مجتمع</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-sm btn-outline-light rounded-pill active" id="politics-tab" data-bs-toggle="tab"
                    data-bs-target="#politics" type="button" role="tab" aria-controls="politics"
                    aria-selected="true">سياسة</button>
            </li>

        </ul>
        <div class="tab-content " id="myTabContent">


            <div class="tab-pane fade show active " id="politic" role="tabpanel" aria-labelledby="politic-tab">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3 justify-content-end" id="card-container">
                    <!-- Card 1 -->

                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=1" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 1</h5>
                                <p class="card-text">This is a wider card with supporting text.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col card-item d-none">
                        <div class="card bg-dark text-white card-equal">
                            <img src="https://picsum.photos/600/400?random=2" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title">Card title 2</h5>
                                <p class="card-text">Another supporting text inside overlay.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for all cards ... -->
                </div>

                <!-- Show More Button (outside row) -->
                <div class="text-center mt-3">
                    <button class="btn btn-primary" id="showMoreBtn">المزيد</button>
                </div>
            </div>


        </div>
    </div>

    <div class="tab-pane fade" id="society" role="tabpanel" aria-labelledby="society-tab">...</div>
    <div class="tab-pane fade" id="technology" role="tabpanel" aria-labelledby="technology-tab">...</div>
    <div class="tab-pane fade" id="world" role="tabpanel" aria-labelledby="world-tab">...</div>
    <div class="tab-pane fade" id="diverse" role="tabpanel" aria-labelledby="diverse-tab">...</div>
    </div>


    </div>
@endsection
