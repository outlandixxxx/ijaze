@extends('layouts.app')

@section('content')
<div class="container-fluid mt-11">

    <!-- Custom Tabs Navigation -->
    <div class="custom-tabs-container mt-4">
        <ul class="custom-tabs" style="z-index: 99;">
            <li class="custom-tab-item active" data-target="politic"><a href="javascript:void(0)">سياسة</a></li>
             <li class="custom-tab-item" data-target="economy"><a href="javascript:void(0)">اقتصاد</a></li>
            <li class="custom-tab-item" data-target="society"><a href="javascript:void(0)">مجتمع</a></li>
            <li class="custom-tab-item" data-target="cultureart"><a href="javascript:void(0)">فن و ثقافة</a></li>
            <li class="custom-tab-item" data-target="technology"><a href="javascript:void(0)">تكنولوجيا</a></li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="custom-tab-content">
        @foreach ($tabPosts as $tabId => $postsData)
            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $tabId }}">

                {{-- ✅ Carousel: last 10 posts --}}
                @include('pages.components.carousel', ['posts' => $postsData['carousel']])

                {{-- ✅ Top 10 by views --}}
               
                    @include('pages.components.swipper2', ['posts' => $postsData['top']])

                {{-- ✅ All articles --}}
                <div class="container px-4 text-end">
                    <h3 class="mb-3">جميع المقالات</h3>
                    <div class="row p-4">
                        <div class="col-sm-12">
                            <div class="card text-white text-end bg-transparent">
                                <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                                    <div
                                        class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 justify-content-end card-container">

                                        @forelse ($postsData['all'] as $post)
                                            <div class="col card-item">
                                                <div class="card text-bg-dark card-equal card-hover">
                                                    <div class="card-img-wrapper">
                                                <img src="{{ $post->media->first()?->path ? asset('storage/' . $post->media->first()->path) : asset('images/placeholder.png') }}"
                                                            class="card-img" alt="{{ $post->title }}">
                                                    </div>

                             

                                                    <div class="card-img-overlay d-flex align-items-end p-2">
                                                        <h5 class="card-title mb-0">
                                                            <a href="{{ route('article', $post->id) }}"
                                                                class="text-white">
                                                                {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-white">لا توجد مقالات حاليا</p>
                                        @endforelse
                                    </div>

                                    {{-- Load more button (if you implement JS to hide/show more) --}}
                                    <div class="text-center mt-3">
                                        <button class="btn btn-dark px-4 show-more-btn">عرض المزيد</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
@endsection
