@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

       
        <!-- Custom Tabs Navigation -->
        <div class="custom-tabs-container mt-4">
            <ul class="custom-tabs" style="z-index: 99;">
                <li class="custom-tab-item active" data-target="news">
                    <a href="javascript:void(0)">اخبار</a>
                </li>
                <li class="custom-tab-item" data-target="order">
                    <a href="javascript:void(0)">ترتيب الدوريات</a>
                </li>
                <li class="custom-tab-item" data-target="match">
                    <a href="javascript:void(0)">مباريات اليوم</a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="custom-tab-content">

            <!-- NEWS TAB -->
            <div class="tab-pane active" id="news">

    
                  <h2 class="text-end m-3" style="color: #ffdc91;"> اخر الأخبار  </h2>


                <div class="row g-3">

                    <!-- LEFT SIDE (first 4 posts stacked) -->
                    <div class="col-md-6 d-flex flex-column">
                        @foreach ($others->take(4) as $post)
                            <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                <div class="card text-white text-end bg-transparent mb-3 flex-fill"
                                    style="min-height:120px;">
                                    <div class="card-body d-flex align-items-center justify-content-between"
                                        style="background-color: #171616; border-radius: 20px;">

                                        {{-- Text on the left --}}
                                        <div class="flex-grow-1 ms-3 m-3">
                                            <h6 class="card-title mb-2" style="color: #ffdc91;">
                                                {{ $post->title }}
                                               
                                            </h6>
                                            <p class="card-text text-muted small mb-0">
                                                {{ Str::limit($post->description, 60, '...') }}
                                            </p>
                                        </div>

                                        {{-- Image on the right --}}
                                        @if ($post->media->isNotEmpty())
                                            <div style="flex:0 0 120px;">
                                                <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                    class="img-fluid rounded" alt="{{ $post->title }}"
                                                    style="width:120px; height:120px; object-fit:cover;">
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>


                    <!-- RIGHT SIDE (featured post) -->
                    <div class="col-md-6 d-flex">
                        <a href="{{ route('article', $featured->slug) }}" class="text-decoration-none w-100">
                            <div class="card text-white text-end bg-transparent w-100" style="height:630px;">
                                <!-- 160px * 4 + margins ≈ 660px -->
                                <div class="card-body h-100" style="background-color: #171616; border-radius: 20px;">
                                    <h2 class="card-title" style="color: #ffdc91;">
                                        {{ $featured->title }}
                                    </h2>

                                    @if ($featured->media->isNotEmpty())
                                        <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                            class="card-image rounded w-100 h-100" alt="{{ $featured->title }}">
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- SECOND ROW (next 4 posts) -->
                <div class="row g-3">
                    @foreach ($others->skip(4)->take(4) as $post)
                        <div class="col-md-3">
                            <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                <div class="card text-white text-end bg-transparent h-100" style="min-height:200px;">
                                    <div class="card-body" style="background-color: #171616; border-radius: 20px;">
                                        <h5 class="card-title mb-2" style="color: #ffdc91;">
                                            {{ $post->title }}
                                        </h5>
                                        @if ($post->media->isNotEmpty())
                                            <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                class="img-fluid rounded mt-2 w-100" alt="{{ $post->title }}"
                                                style="max-height:280px; object-fit:cover;">
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="row p-4">
                    <div class="col-sm-12">
                        <div class="card text-white text-end  bg-transparent">
                            <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                                <h2 class="card-title mb-3" style="color: #ffdc91;"> جميع المقالات 
                                </h2>

                                {{-- ================= IMAGE POSTS ================= --}}
                                <h4 class="m-5 text-end">صور</h4>
                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">

                                    @forelse ($allposts as $post)
                                        @php $media = $post->media->first(); @endphp
                                        @if ($media && $media->type === 'image')
                                            <div class="col card-item d-none">
                                                <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                                    <div class="card bg-dark text-white card-amusing card-hover card-equal">
                                                        <img src="{{ $media->path ? asset('storage/' . $media->path) : asset('storage/' . $media->thumbnail) }}"
                                                            class="card-img" alt="{{ $post->title }}">
                                                        <div
                                                            class="card-img-overlay d-flex flex-column justify-content-end">
                                                            <h5 class="card-title">{{ $post->title }}</h5>
                                                            <p class="card-text">{{ Str::limit($post->content, 60) }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @empty
                                        <p class="text-muted">لا توجد مقالات</p>
                                    @endforelse
                                   
                                </div>

                                 <div class="text-center mt-3">
                                        <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                                    </div>

                                {{-- ================= VIDEO POSTS ================= --}}
                                <h4 class="m-5 text-end">فيديوهات</h4>
                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">
                                    @forelse ($allposts as $post)
                                        @php $media = $post->media->first(); @endphp
                                        @if ($media && in_array(strtolower($media->type), ['aivideo', 'videotube']))
                                            <div class="col card-item d-none">
                                                <a href="{{ route('article', $post->slug) }}"
                                                    class="text-decoration-none">
                                                    <div
                                                        class="card bg-dark text-white card-amusing card-hover card-equal">
                                                        <img src="{{ asset('storage/' . $media->thumbnail) }}"
                                                            class="card-img" alt="{{ $post->title }}">
                                                        <div
                                                            class="card-img-overlay d-flex flex-column justify-content-end">
                                                            <h5 class="card-title">{{ $post->title }}</h5>
                                                            <p class="card-text">{{ Str::limit($post->content, 60) }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @empty
                                        <p class="text-muted">لا توجد مقالات</p>
                                    @endforelse

                                   
                                </div>
                                 <div class="text-center mt-3">
                                        <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- END NEWS -->

                <!-- ORDER TAB -->
                <div class="tab-pane" id="order">
                    <h4 class="m-5 text-end">ترتيب الدوريات</h4>
                    <div
                        class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="{{ 'imagenews' }}" class="text-decoration-none">
                                <div class="card text-white text-end bg-transparent h-100">
                                    <div class="card-body" style="background-color: #171616; border-radius: 20px;">
                                        <h2 class="card-title mb-3" style="color: #ffdc91;">
                                            Card A <i class="fa-solid fa-people-group fa-xl"></i>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        @endfor
                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div> <!-- END ORDER -->

                <!-- MATCH TAB -->
                <div class="tab-pane" id="match">
                    <h4 class="m-5 text-end">مباريات</h4>
                    <div
                        class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">
                        @for ($i = 1; $i <= 30; $i++)
                            <a href="{{ 'imagenews' }}" class="text-decoration-none">
                                <div class="card text-white text-end bg-transparent h-100">
                                    <div class="card-body" style="background-color: #171616; border-radius: 20px;">
                                        <h2 class="card-title mb-3" style="color: #ffdc91;">
                                            Card A <i class="fa-solid fa-people-group fa-xl"></i>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        @endfor
                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                        </div>
                    </div>
                </div> <!-- END MATCH -->

            </div> <!-- END TAB CONTENT -->
        </div>
    @endsection
