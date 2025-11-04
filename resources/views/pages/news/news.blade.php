@extends('layouts.app')

@section('content')
<div class="container-fluid mt-11">

    <!-- Custom Tabs Navigation -->
    <div class="custom-tabs-container mt-4">
        <ul class="custom-tabs" style="z-index: 99;">
            <li class="custom-tab-item active" data-target="politic">
                <a href="javascript:void(0)">{{ __('Politics') }}</a>
            </li>
            <li class="custom-tab-item" data-target="economy">
                <a href="javascript:void(0)">{{ __('Economy') }}</a>
            </li>
            <li class="custom-tab-item" data-target="society">
                <a href="javascript:void(0)">{{ __('Society') }}</a>
            </li>
            <li class="custom-tab-item" data-target="cultureart">
                <a href="javascript:void(0)">{{ __('Culture & Art') }}</a>
            </li>
            <li class="custom-tab-item" data-target="technology">
                <a href="javascript:void(0)">{{ __('Technology') }}</a>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="custom-tab-content">
        @foreach ($tabPosts as $tabId => $postsData)
            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $tabId }}">

                {{-- Carousel: last 10 posts --}}
                @include('pages.components.carousel', ['posts' => $postsData['carousel']])

                {{-- Top 10 by views --}}
                @include('pages.components.swipper2', ['posts' => $postsData['top']])

                {{-- All articles --}}
                <div class="container px-4">
                    <h3 class="mb-3">{{ __('All Articles') }}</h3>
                    <div class="row p-4">
                        <div class="col-sm-12">
                            <div class="card text-white bg-transparent">
                                <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                                        @forelse ($postsData['all'] as $post)
                                            <div class="col card-item">
                                                <div class="card text-bg-dark card-equal card-hover">
                                                    <div class="card-img-wrapper">
                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                            class="card-img" alt="{{ $post->title }}">
                                                    </div>

                                                    <div class="card-img-overlay d-flex align-items-end p-2">
                                                        <h5 class="card-title mb-0 text-truncate">
                                                            <a href="{{ route('article', $post->slug) }}"
                                                                class="text-white text-decoration-none">
                                                                {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-white">{{ __('No articles available') }}</p>
                                        @endforelse
                                    </div>

                                    {{-- Load more button --}}
                                    <div class="text-center mt-3">
                                        <button class="btn btn-dark px-4 show-more-btn">{{ __('Show More') }}</button>
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
