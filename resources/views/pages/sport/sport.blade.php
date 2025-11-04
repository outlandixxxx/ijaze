@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <!-- Custom Tabs Navigation -->
        <div class="custom-tabs-container mt-4">
            <ul class="custom-tabs" style="z-index: 99;">
                <li class="custom-tab-item active" data-target="news">
                    <a href="javascript:void(0)">{{ __('News') }}</a>
                </li>
                <li class="custom-tab-item" data-target="order">
                    <a href="javascript:void(0)">{{ __('League Standings') }}</a>
                </li>
                <li class="custom-tab-item" data-target="match">
                    <a href="javascript:void(0)">{{ __('Today\'s Matches') }}</a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="custom-tab-content">

            <!-- NEWS TAB -->
            <div class="tab-pane active" id="news">

                <div id="index-title">
                    <span>{{ __('Latest News') }}</span>
                </div>

               <div class="row g-3">

    @if(app()->getLocale() == 'ar')
        <!-- RTL: Featured first = RIGHT, Small posts second = LEFT -->
        
        <!-- Featured Post (appears first = RIGHT in RTL) -->
        <div class="col-md-6 d-flex">
            <a href="{{ route('article', $featured->slug) }}" class="text-decoration-none w-100">
                <div class="card text-white bg-transparent w-100" style="height:630px;">
                    <div class="card-body h-100" style="background-color: #171616; border-radius: 20px;">
                        <h2 class="card-title" style="color: #ffdc91;">
                            {{ $featured->title }}
                        </h2>

                        @if ($featured->media->isNotEmpty())
                            <img src="{{ asset('storage/' . ($featured->media->first()->thumbnail ?? $featured->media->first()->path)) }}"
                                class="card-image rounded w-100 h-100" alt="{{ $featured->title }}"
                                style="object-fit: cover;">
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <!-- Small Posts Section (appears second = LEFT in RTL) -->
        <div class="col-md-6 d-flex flex-column">
            @foreach ($others->take(4) as $post)
                <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                    <div class="card text-white bg-transparent mb-3 flex-fill" style="min-height:120px;">
                        <div class="card-body d-flex align-items-center justify-content-between"
                            style="background-color: #171616; border-radius: 20px;">

                            {{-- Text --}}
                            <div class="flex-grow-1 m-3">
                                <h6 class="card-title mb-2" style="color: #ffdc91;">
                                    {{ $post->title }}
                                </h6>
                                <p class="card-text text-muted small mb-0">
                                    {{ Str::limit($post->description, 60, '...') }}
                                </p>
                            </div>

                            {{-- Image --}}
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

    @else
        <!-- LTR: Featured first = LEFT, Small posts second = RIGHT -->
        
        <!-- Featured Post (appears first = LEFT in LTR) -->
        <div class="col-md-6 d-flex">
            <a href="{{ route('article', $featured->slug) }}" class="text-decoration-none w-100">
                <div class="card text-white bg-transparent w-100" style="height:630px;">
                    <div class="card-body h-100" style="background-color: #171616; border-radius: 20px;">
                        <h2 class="card-title" style="color: #ffdc91;">
                            {{ $featured->title }}
                        </h2>

                        @if ($featured->media->isNotEmpty())
                            <img src="{{ asset('storage/' . ($featured->media->first()->thumbnail ?? $featured->media->first()->path)) }}"
                                class="card-image rounded w-100 h-100" alt="{{ $featured->title }}"
                                style="object-fit: cover;">
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <!-- Small Posts Section (appears second = RIGHT in LTR) -->
        <div class="col-md-6 d-flex flex-column">
            @foreach ($others->take(4) as $post)
                <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                    <div class="card text-white bg-transparent mb-3 flex-fill" style="min-height:120px;">
                        <div class="card-body d-flex align-items-center justify-content-between"
                            style="background-color: #171616; border-radius: 20px;">

                            {{-- Text --}}
                            <div class="flex-grow-1 m-3">
                                <h6 class="card-title mb-2" style="color: #ffdc91;">
                                    {{ $post->title }}
                                </h6>
                                <p class="card-text text-muted small mb-0">
                                    {{ Str::limit($post->description, 60, '...') }}
                                </p>
                            </div>

                            {{-- Image --}}
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
    @endif

</div>





                <!-- SECOND ROW (next 4 posts) -->
                <div class="row g-3 mt-3">
                    @foreach ($others->skip(4)->take(4) as $post)
                        <div class="col-md-3">
                            <a href="{{ route('article', $post->slug) }}" class="text-decoration-none">
                                <div class="card text-white bg-transparent h-100" style="min-height:200px;">
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

                <!-- ALL ARTICLES SECTION -->
                <div class="row p-4">
                    <div class="col-sm-12">
                        <div class="card text-white bg-transparent">
                            <div class="card-body" style="background-color: #171616; border-radius: 30px;">

                                <div id="index-title">
                                    <span>{{ __('All Articles') }}</span>
                                </div>

                                {{-- IMAGE POSTS --}}
                                <div class="mt-3">
                                    <div id="second-title">
                                        <span>{{ __('Photos') }}</span>
                                    </div>
                                </div>

                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">

                                    @forelse ($allposts as $post)
                                        @php $media = $post->media->first(); @endphp
                                        @if ($media && $media->type === 'image')
                                            <div class="col card-item d-none">
                                                <a href="{{ route('article', $post->slug) }}"
                                                    class="text-decoration-none">
                                                    <div
                                                        class="card bg-dark text-white card-amusing card-hover card-equal">
                                                        <img src="{{ asset('storage/' . ($media->thumbnail ?? $media->path)) }}"
                                                            class="card-img" alt="{{ $post->title }}">
                                                        <div
                                                            class="card-img-overlay d-flex flex-column justify-content-end">
                                                            <h5 class="card-title">{{ $post->title }}</h5>
                                                            <p class="card-text">{{ Str::limit($post->description, 60) }}
                                                            </p>
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

                                {{-- VIDEO POSTS --}}
                                <div class="mt-3">
                                    <div id="second-title">
                                        <span>{{ __('Videos') }}</span>
                                    </div>
                                </div>

                                <div
                                    class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">
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
                                                            <p class="card-text">{{ Str::limit($post->description, 60) }}
                                                            </p>
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

            </div> <!-- END NEWS TAB -->

            <!-- ORDER TAB -->
            <div class="tab-pane" id="order">
                <h4 class="m-5">{{ __('League Standings') }}</h4>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">
                    @for ($i = 1; $i <= 30; $i++)
                        <a href="#" class="text-decoration-none">
                            <div class="card text-white bg-transparent h-100">
                                <div class="card-body" style="background-color: #171616; border-radius: 20px;">
                                    <h2 class="card-title mb-3" style="color: #ffdc91;">
                                        {{ __('Card') }} {{ $i }} <i
                                            class="fa-solid fa-people-group fa-xl"></i>
                                    </h2>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 show-more-btn">{{ __('Show More') }}</button>
                </div>
            </div>

            <!-- MATCH TAB -->
            <div class="tab-pane" id="match">
                <h4 class="m-5">{{ __('Today\'s Matches') }}</h4>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 row-cols-xl-6 g-2 mt-3 card-container">
                    @for ($i = 1; $i <= 30; $i++)
                        <a href="#" class="text-decoration-none">
                            <div class="card text-white bg-transparent h-100">
                                <div class="card-body" style="background-color: #171616; border-radius: 20px;">
                                    <h2 class="card-title mb-3" style="color: #ffdc91;">
                                        {{ __('Match') }} {{ $i }} <i class="fa-solid fa-futbol fa-xl"></i>
                                    </h2>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-dark px-4 show-more-btn">{{ __('Show More') }}</button>
                </div>
            </div>

        </div> <!-- END TAB CONTENT -->
    </div>
@endsection
