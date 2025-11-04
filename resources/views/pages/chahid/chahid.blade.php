@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-10">
        @foreach ($subCategoriesData as $data)
            <div class="row p-4">
                <div class="col-sm-12">
                    <div class="card text-white bg-transparent">
                        <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                            <h3 id="tv" class="card-title mb-5">
                                {{ $data['subCategory']->name }}
                            </h3>

                            <div class="custom-section p-3">

                                {{-- Swiper (top 10 most viewed) --}}
                                @include('pages.components.swipper2', ['posts' => $data['topPosts']])

                                {{-- All posts --}}
                                <div id="second-title">
                                    <span>{{ __('All Articles') }}</span>
                                </div>
                                
                                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                                    @forelse ($data['allPosts'] as $post)
                                        <div class="col card-item d-none">
                                            <div class="card bg-dark text-white card-amusing card-hover card-equal">

                                                @if ($post->media->first())
                                                    <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                                        class="card-img" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ asset('images/placeholder.png') }}"
                                                        class="card-img" alt="placeholder">
                                                @endif

                                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                    <h5 class="card-title">
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

                                <div class="text-center mt-3">
                                    <button class="btn btn-dark px-4 show-more-btn">{{ __('Show More') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
