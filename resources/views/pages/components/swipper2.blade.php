<div class="container px-4 mb-5">
  
    <div id="second-title">
        <span>{{ __('Most Viewed') }}</span>
    </div>
    
    <div class="swiper cardSwiper2 position-relative w-100">
        <div class="swiper-wrapper">
            @foreach($posts as $post)
                <div class="swiper-slide">
                    <div class="card text-bg-dark card-equal card-hover">
                        <div class="card-img-wrapper">
                            @if ($post->media->first())
                                <img src="{{ asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path)) }}"
                                     class="card-img"
                                     alt="{{ $post->title }}">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}"
                                     class="card-img"
                                     alt="placeholder">
                            @endif
                        </div>
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="{{ route('article', $post->slug) }}" class="text-white text-decoration-none">
                                    {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Swiper controls -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
