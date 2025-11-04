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
                <li class="custom-tab-item" data-target="diverse">
                    <a href="javascript:void(0)">{{ __('Diverse') }}</a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="custom-tab-content mt-5">
            @foreach ($tabPosts as $tabId => $postsData)
                <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $tabId }}">

                    <div class="container-fluid px-4 mb-5">
                         <div id="third-title">
                            <span> {{ __('Latest News') }}
                            </span>
                        </div>
                        
                        {{-- Carousel: last 10 posts --}}
                        @include('pages.components.swippervideo', ['posts' => $postsData['top']])
                    </div>

                    <div class="container-fluid px-4 mb-5">

                         <div id="third-title">
                            <span> {{ __('Most Viewed') }}
                            </span>
                        </div>
                        
                        {{-- Top 10 by views --}}
                        @include('pages.components.swippervideo', ['posts' => $postsData['top']])
                    </div>

                    {{-- All articles --}}
                    <div class="container-fluid px-4">
                        <div id="third-title">
                            <span> {{ __('All Articles') }}
                            </span>
                        </div>
                        <div class="row p-4">
                            <div class="col-sm-12">
                                <div class="card text-white bg-transparent">
                                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                                            @forelse ($postsData['all'] as $post)
                                                <div class="col card-item">
                                                    <div class="card video-card text-bg-dark card-equal card-hover"
                                                        data-bs-toggle="modal" data-bs-target="#videoModal"
                                                        data-video="{{ $post->media->first()?->path }}">
                                                        @if ($post->media->first())
                                                            <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                                class="card-img" alt="{{ $post->title }}">
                                                        @else
                                                            <img src="{{ asset('images/placeholder.png') }}"
                                                                class="card-img" alt="placeholder">
                                                        @endif
                                                        <div class="card-img-overlay d-flex align-items-end p-2">
                                                            <h5 class="card-title mb-0">
                                                                {{ \Illuminate\Support\Str::limit($post->title, 40) }}
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

        <!-- Video Modal (shared for all tabs) -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-transparent">
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <iframe id="videoFrame" width="356" height="633" src="" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const videoModal = document.getElementById('videoModal');
                const videoFrame = document.getElementById('videoFrame');

                document.querySelectorAll('.video-card').forEach(card => {
                    card.addEventListener('click', () => {
                        const videoUrl = card.getAttribute('data-video');
                        if (videoUrl) {
                            const autoplayUrl = videoUrl.includes('?') ?
                                videoUrl + '&autoplay=1' :
                                videoUrl + '?autoplay=1';
                            videoFrame.src = autoplayUrl;
                        }
                    });
                });

                videoModal.addEventListener('hidden.bs.modal', () => {
                    videoFrame.src = "";
                });
            });
        </script>
    </div>
@endsection
