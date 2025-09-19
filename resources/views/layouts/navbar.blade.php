    <!-- Navbar -->
    <!-- Large screens navbar (centered) -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-custom fixed-top d-none d-lg-flex">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav gap-3 text-center">
                    <li class="nav-item"><a class="btn btn-outline-light noto-sans-arabic  px-3"
                            href="{{ '/' }}#amusing">منوعات</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light noto-sans-arabic px-3"
                            href="{{ '/' }}#ai"> AI بالـ </a></li>
                    <li class="nav-item"><a class="btn btn-outline-light noto-sans-arabic px-3"
                            href="{{ '/' }}#sport">رياضة</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light noto-sans-arabic px-3"
                            href="{{ '/' }}#trending">شاهد</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light noto-sans-arabic px-3"
                            href="{{ '/' }}#breakingnews">أخبار </a></li>
                    <li class="nav-item " aria-current="page"><a class="btn btn-outline-light noto-sans-arabic active px-3 "
                            href="{{ '/' }}#index">الرئيسية</a></li>
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


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll(".navbar-nav .btn");

            navLinks.forEach(link => {
                link.addEventListener("click", function () {
                    // Remove active from all
                    navLinks.forEach(l => l.classList.remove("active"));

                    // Add active only to clicked one
                    this.classList.add("active");
                });
            });
        });
        </script>
