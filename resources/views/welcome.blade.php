<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Bootstrap Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!-- Navbar -->
    <!-- Large screens navbar (centered) -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top d-none d-lg-flex">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav gap-3 text-center">
                    <li class="nav-item"><a class="btn btn-outline-success rounded-pill btn-lg px-3"
                            href="#section1">الرئيسية</a></li>
                    <li class="nav-item"><a class="btn btn-outline-primary rounded-pill btn-lg px-3"
                            href="#section2">الفن</a></li>
                    <li class="nav-item"><a class="btn btn-outline-warning rounded-pill btn-lg px-3"
                            href="#section3">التاريخ</a></li>
                    <li class="nav-item"><a class="btn btn-outline-danger rounded-pill btn-lg px-3"
                            href="#section4">العالم</a></li>
                </ul>
            </div>
            <a class="navbar-brand ms-auto" href="#"><img src="{{ asset('images/logo.png') }}" alt="Bootstrap"
                    width="200" height="80"></a>
        </div>
    </nav>

    <!-- Mobile navbar with offcanvas sidebar -->
    <nav class="navbar navbar-light bg-dark offcanvastyle fixed-top d-lg-none">
        <div class="container-fluid">
            <!-- Toggler left -->
            <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand right -->
            <a class="navbar-brand ms-auto" href="#"><img src="{{ asset('images/logo.png') }}" alt="Bootstrap"
                    width="150" height="60"></a>
        </div>
    </nav>

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start offcanvastyle" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">القائمة</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link menustyle" href="#">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link menustyle" href="#">الفن</a></li>
                <li class="nav-item"><a class="nav-link menustyle" href="#">التاريخ</a></li>
                <li class="nav-item"><a class="nav-link menustyle" href="#">العالم</a></li>
            </ul>
        </div>
    </div>




    <!-- Sections -->
    <section id="section1" class="content-section d-flex align-items-center justify-content-center">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="true">

            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel/1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel/4.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fourth slide label</h5>
                        <p>Some representative placeholder content for the fourth slide.</p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div> <!-- carouselExampleCaptions -->
    </section>


    <section id="section2" class="content-section d-flex align-items-end justify-content-end mt-8">
    <div class="container px-4 text-end">
        <h2 class="mb-3">الرئيسية</h2>
        <p class="lead fs-5">اكتشف ابرز و امتع  وثائقنا</p>

<div class="swiper cardSwiper position-relative w-100">

            <div class="swiper-wrapper">

                <!-- Card 1 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card1.png') }}" class="card-img" alt="Card 1">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">الغضنفر المقاتل</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 2">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card3.png') }}" class="card-img" alt="Card 3">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card4.png') }}" class="card-img" alt="Card 4">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card5.png') }}" class="card-img" alt="Card 5">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="swiper-slide">
                    <div class="card h-100 text-bg-dark">
                        <img src="{{ asset('images/documentary/card2.png') }}" class="card-img" alt="Card 6">
                        <div class="card-img-overlay d-flex align-items-end p-2">
                            <h5 class="card-title mb-0">
                                <a href="#" class="text-white">سءسءسءسنننسن مءنمسنتمءن</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Add more cards similarly -->
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination dots -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>



   <section id="section3" class="content-section d-flex align-items-end justify-content-end mt-8">
      <div class="container px-4 text-end">
          <h2 class="mb-3">تراندين</h2>
          <p class="lead fs-5">اكتشف الاكثر مشاهدة</p>
      </div>
    </section>

   <section id="section4" class="content-section d-flex align-items-end justify-content-end mt-8">
      <div class="container px-4 text-end">
          <h2 class="mb-3">عاجل</h2>
          <p class="lead fs-5">ابرز الاحداث العالمية العاجلة</p>
          
      </div>
    </section>

<section id="section5" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">قسم الفيديوهات</h2>
    <div class="row g-3">

      <!-- Featured video -->
      <div class="col-lg-8 col-md-12">
        <div class="card h-100 position-relative">
          <video id="featured-video" class="w-100 h-70" autoplay muted loop playsinline>
            <source src="{{ asset('images/videos/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <div class="card-img-overlay d-flex align-items-end">
            <h5 id="featured-title" class="card-title bg-dark bg-opacity-50 p-2 rounded text-white">فيديو 1</h5>
          </div>
        </div>
      </div>

      <!-- Small video thumbnails -->
      <div class="col-lg-4 col-md-12">
        <div class="row g-3">

          <div class="col-12">
            <div class="card h-100 small-video" 
                 data-video="{{ asset('images/videos/video1.mp4') }}" 
                 data-title="فيديو 1">
              <img src="{{ asset('images/videos/video1.png') }}" class="card-img" alt="Video 1">
            </div>
          </div>

          <div class="col-12">
            <div class="card h-100 small-video" 
                 data-video="{{ asset('images/videos/video2.mp4') }}" 
                 data-title="فيديو 2">
              <img src="{{ asset('images/videos/video2.png') }}" class="card-img" alt="Video 2">
            </div>
          </div>

          <div class="col-12">
            <div class="card h-100 small-video" 
                 data-video="{{ asset('images/videos/video3.mp4') }}" 
                 data-title="فيديو 3">
              <img src="{{ asset('images/videos/video3.png') }}" class="card-img" alt="Video 3">
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<script>
  const featuredVideo = document.getElementById('featured-video');
  const featuredTitle = document.getElementById('featured-title');
  const smallVideos = document.querySelectorAll('.small-video');

  let index = 0;

  function swapVideo() {
    const video = smallVideos[index];
    const src = video.getAttribute('data-video');
    featuredVideo.src = src;
    featuredVideo.load(); // reload video
    featuredVideo.play(); // play automatically
    featuredTitle.textContent = video.getAttribute('data-title');
    index = (index + 1) % smallVideos.length;
  }

  // change featured every 5 seconds
  setInterval(swapVideo, 8000);
</script>



</body>

</html>
