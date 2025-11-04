@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <!-- Images Section -->
        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                      

                         <div id="third-title">
                            <span>                             {{ __('Related Articles') }}

                            </span>
                        </div>

                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                            {{-- Images --}}
                            @forelse ($posts as $post)
                                @php $media = $post->media->first(); @endphp
                                @if ($media && $media->type === 'image')
                                    <div class="col card-item d-none">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="card bg-dark text-white card-amusing card-hover card-equal">
                                                <img src="{{ asset('storage/' . ($media->thumbnail ?? $media->path)) }}"
                                                    class="card-img" alt="{{ $post->title }}">
                                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                    <h5 class="card-title">{{ $post->title }}</h5>
                                                    <p class="card-text">{{ Str::limit($post->description, 60) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <p class="text-muted">{{ __('No articles available') }}</p>
                            @endforelse

                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-dark px-4 show-more-btn">{{ __('Show More') }}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Videos Section -->
        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">
                       

                         <div id="third-title">
                            <span>                            {{ __('Videos') }}

                            </span>
                        </div>

                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                            {{-- Videos --}}
                            @forelse ($posts as $post)
                                @php $media = $post->media->first(); @endphp
                                @if ($media && in_array(strtolower($media->type), ['aivideo', 'videotube']))
                                    <div class="col card-item d-none">
                                        <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                            <div class="card bg-dark text-white card-amusing card-hover card-equal">
                                                <img src="{{ asset('storage/' . $media->thumbnail) }}" class="card-img"
                                                    alt="{{ $post->title }}">
                                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                    <h5 class="card-title">{{ $post->title }}</h5>
                                                    <p class="card-text">{{ Str::limit($post->description, 60) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <p class="text-muted">{{ __('No articles available') }}</p>
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
@endsection
