<section class="creative-carousal--hero" style="margin-top: -97px;">
    <div class="carousel-slider swiper-container-horizontal">
        <div class="swiper-wrapper">
            @foreach($posts as $post)
                <div class="swiper-slide" 
                     data-background="{{ $post->media->first()?->path ? asset('storage/' . $post->media->first()->path) : asset('images/placeholder.png') }}"
                     style="background-image: url({{ $post->media->first()?->path ? asset('storage/' . $post->media->first()->path) : asset('images/placeholder.png') }});">
                     
                    <div class="inner">
                        <h2>{{ \Illuminate\Support\Str::limit($post->title, 50) }}</h2>
                        <a href="{{ route('article', $post->id) }}" class="stretched-link">
                            {{ \Illuminate\Support\Str::limit($post->description, 80) }}
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

        <div class="swiper-button-prev">السابق</div>
        <div class="swiper-button-next">التالي</div>
    </div>
</section>
