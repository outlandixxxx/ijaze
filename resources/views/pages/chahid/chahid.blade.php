@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-10">
        @foreach ($subCategoriesData as $data)
            <div class="row p-4">


                <div class="col-sm-12">

                    <div class="card text-white text-end  bg-transparent">
                        <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                            <h3 class="card-title mb-5" style="color: #ffdc91;">
                                {{ $data['subCategory']->name }}

                            </h3>


                            <div class="custom-section p-3">


                                {{-- Swiper (top 10 most viewed) --}}
                                @include('pages.components.swipper2', ['posts' => $data['topPosts']])

                                {{-- All posts --}}
                                <h3 class="mt-4">جميع المقالات</h3>
                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">


                                    @forelse ($data['allPosts'] as $post)
                                        <div class="col card-item d-none">
                                            <div class="card bg-dark text-white card-amusing card-hover card-equal">


                                                <img src="{{ $post->media->first()?->path ? asset('storage/' . $post->media->first()->path) : asset('images/placeholder.png') }}"
                                                    class="card-img" alt="{{ $post->title }}">

                                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                    <h5 class="card-title"> <a href="{{ route('article', $post->id) }}"
                                                            class="text-white">
                                                            {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                                        </a></h5>

                                                    </h5>
                                                </div>

                                            </div>






                                        </div>
                                    @empty
                                        <p class="text-white">لا توجد مقالات حاليا</p>
                                    @endforelse


                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection




{{-- @extends('layouts.app')

@section('content')
    <div class="container-fluid mt-10">

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h3 class="card-title mb-5" style="color: #ffdc91;"> متداول <i class="fas fa-network-wired"></i> <i
                                class="fa-solid fa-people-group fa-xl"></i>
                        </h3>


                        <div class="custom-section p-3">

                            @include('pages.components.swipper2')

                            <h3>جميع المقالات</h3>
                            <div
                                class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">
                                   @for ($i = 1; $i <= 30; $i++)
                                    <div class="col card-item d-none">
                                        <div class="card bg-dark text-white card-amusing card-hover card-equal">
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



    </div>
@endsection
 --}}
