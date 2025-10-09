<div class="container px-4 text-end  mb-5">
    <h3 class="mb-3">الاكثر مشاهدة</h3>
    <div class="swiper cardSwiper2 position-relative w-100 ">
        <div class="swiper-wrapper justify-content-end">
            @foreach($posts as $post)
                <div class="swiper-slide">
                    <div class="card text-bg-dark card-equal card-hover">
                        <div class="card-img-wrapper">
                            <img src="{{ $post->media->first()?->path ? asset('storage/' . $post->media->first()->path) : asset('images/placeholder.png') }}"
                                 class="card-img"
                                 alt="{{ $post->title }}">
                        </div>
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="{{ route('article', $post->id) }}" class="text-white">
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
