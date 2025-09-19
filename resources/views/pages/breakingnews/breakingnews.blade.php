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
                 <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">

                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container"
                            >

                            <!-- Example with more than 10 items -->
                            @for ($i = 1; $i <= 30; $i++)
                            <div class="col card-item d-none">
                                <a href="{{ 'imagenews' }}" class="text-decoration-none">
                                    <div class="card bg-dark text-white card-equal">
                                        <img src="https://assets.kooora.com/images/v3/getty-2231158186/crop/MM5DGMZRGI5DCOBWGM5G433XMU5DENZZHIZQ====/GettyImages-2231158186.jpg?quality=60&auto=webp&format=pjpg&width=980"
                                             class="card-img" alt="...">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <h5 class="card-title text-white">"الانضباط" تسدل الستار على ملف عقوبة هويسين</h5>
                                        </div>
                                    </div>
                                </a>
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
    </div>

    <div class="tab-pane fade" id="society" role="tabpanel" aria-labelledby="society-tab">...</div>
    <div class="tab-pane fade" id="technology" role="tabpanel" aria-labelledby="technology-tab">...</div>
    <div class="tab-pane fade" id="world" role="tabpanel" aria-labelledby="world-tab">...</div>
    <div class="tab-pane fade" id="diverse" role="tabpanel" aria-labelledby="diverse-tab">...</div>
    </div>


    </div>
@endsection
