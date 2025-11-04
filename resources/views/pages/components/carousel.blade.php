<section class="creative-carousal--hero" style="margin-top: -97px;">
    <div class="carousel-slider swiper-container-horizontal">
        <div class="swiper-wrapper">
            @foreach($posts as $post)
                @php
                    $imageUrl = $post->media->first() 
                        ? asset('storage/' . ($post->media->first()->thumbnail ?? $post->media->first()->path))
                        : asset('images/placeholder.png');
                @endphp
                <div class="swiper-slide" 
                     data-background="{{ $imageUrl }}"
                     style="background-image: url({{ $imageUrl }});">
                     
                    <div class="inner">
                        
                        <a href="{{ route('article', $post->slug) }}" class="stretched-link">

                            <h4>{{ \Illuminate\Support\Str::limit($post->title, 50) }}</h4">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Progress + navigation -->
        <div class="slide-progress"> 
            <span>01</span>
            <div class="swiper-pagination swiper-pagination-progressbar">
                <span class="swiper-pagination-progressbar-fill"></span>
            </div>
            <span>{{ str_pad($posts->count(), 2, '0', STR_PAD_LEFT) }}</span>
        </div>

        <div class="swiper-button-prev">{{ __('Previous') }}</div>
        <div class="swiper-button-next">{{ __('Next') }}</div>
    </div>
</section>
