{{-- 

<!-- Navbar -->
<!-- Large screens navbar (centered) -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-custom fixed-top d-none d-lg-flex">
  <div class="container-fluid">
    <!-- Left side button -->
    <div class="dropdown me-3">
      <button class="btn btn-outline-light" type="button" id="settingsMenuButton" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="bi bi-grid-fill"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="settingsMenuButton">
        <li>
          <button class="dropdown-item" id="themeToggle">
            ليل/نهار            <i class="fa-solid fa-circle-half-stroke" style="color: #fcfcfc;"></i>
          </button>
        </li>
        <li>
          <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal">
            تواصل معنا <i class="fa fa-envelope me-2 contact_text_menu"></i>
          </button>
        </li>
      </ul>
    </div>

    <!-- Centered menu -->
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav gap-3 text-center">
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('amusing') ? 'active' : '' }}"
            href="{{ url('/') }}#amusing">منوعات</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('ai') ? 'active' : '' }}"
            href="{{ url('/') }}#ai">AI بالـ</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('sport') ? 'active' : '' }}"
            href="{{ url('/') }}#sport">رياضة</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('shahid') ? 'active' : '' }}"
            href="{{ url('/') }}#shahid">شاهد</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('news') ? 'active' : '' }}"
            href="{{ url('/') }}#news">أخبار</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('/') ? 'active' : '' }}"
            href="{{ url('/') }}#index">الرئيسية</a>
        </li>
      </ul>
    </div>

    <!-- Right logo -->
    <a class="navbar-brand ms-auto" href="/">
      <img src="{{ asset('images/logo.png') }}" alt="Bootstrap" width="80" height="45">
    </a>
  </div>
</nav>

<!-- Mobile navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top d-lg-none">
  <div class="container-fluid">
    <!-- Left: offcanvas toggler -->
    <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
      <i class="bi bi-list"></i>
    </button>

    <!-- Right: logo -->
    <a class="navbar-brand ms-auto" href="/">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" height="45">
    </a>
  </div>
</nav>

<!-- Offcanvas (mobile menu) -->
<div class="offcanvas offcanvas-start bg-dark text-white d-flex flex-column" tabindex="-1" id="offcanvasMenu">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">القائمة</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column justify-content-between">
    <!-- Menu links -->
    <ul class="navbar-nav text-end flex-grow-1">
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#index">الرئيسية</a></li>
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#amusing">منوعات</a></li>
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#ai">AI بالـ</a></li>
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#sport">رياضة</a></li>
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#shahid">شاهد</a></li>
      <li class="nav-item mb-3 border-bottom pb-2"><a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#news">أخبار</a></li>
    </ul>

    <!-- Settings button at the bottom -->
    <div class="mt-auto">
      <div class="dropdown mb-3">
        <button class="btn btn-outline-light w-100" type="button" id="mobileSettingsMenu" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="bi bi-grid-fill me-2"></i> الإعدادات
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="mobileSettingsMenu">
          <li>
            <button class="dropdown-item" id="themeToggleMobile">
            ليل/نهار 
              <i class="fa-solid fa-circle-half-stroke" style="color: #fcfcfc;"></i>
            </button>
          </li>
          <li>
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal">
              تواصل معنا <i class="fa fa-envelope me-2 contact_text_menu"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".navbar-nav .btn");

  navLinks.forEach(link => {
    link.addEventListener("click", function () {
      navLinks.forEach(l => l.classList.remove("active"));
      this.classList.add("active");
    });
  });
});
</script>

@include('pages.components.contact')
 --}}

<!-- Navbar -->
<!-- Large screens navbar (centered) -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-custom fixed-top d-none d-lg-flex">
  <div class="container-fluid">
    
    @if(app()->getLocale() == 'ar')
      <!-- ARABIC LAYOUT: Logo LEFT | Centered Menu | Settings RIGHT -->
      <a class="navbar-brand me-auto" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="80" height="45">
      </a>

      <!-- Centered menu -->
      <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav gap-3 text-center">
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('/') ? 'active' : '' }}"
              href="{{ url('/') }}#index">{{ __('Home') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('news') ? 'active' : '' }}"
              href="{{ url('/') }}#news">{{ __('News') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('shahid') ? 'active' : '' }}"
              href="{{ url('/') }}#shahid">{{ __('Watch') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('sport') ? 'active' : '' }}"
              href="{{ url('/') }}#sport">{{ __('Sports') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('ai') ? 'active' : '' }}"
              href="{{ url('/') }}#ai">{{ __('AI News') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('amusing') ? 'active' : '' }}"
              href="{{ url('/') }}#amusing">{{ __('Diverse') }}</a>
          </li>
        </ul>
      </div>

      <!-- Settings button on RIGHT for Arabic -->
      <div class="dropdown ms-3">
        <button class="btn btn-outline-light" type="button" id="settingsMenuButton" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="bi bi-grid-fill"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="settingsMenuButton">
          <li>
            <button class="dropdown-item" id="themeToggle">
              {{ __('Light/Dark') }}
              <i class="fa-solid fa-circle-half-stroke" style="color: #fcfcfc;"></i>
            </button>
          </li>
          <li>
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal">
              {{ __('Contact Us') }}
              <i class="fa fa-envelope me-2 contact_text_menu"></i>
            </button>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <div class="dropdown-item">
              <strong>{{ __('Language:') }}</strong>
            </div>
          </li>
          <li>
            <a class="dropdown-item active" href="{{ route('lang.switch', 'ar') }}">
              <i class="bi bi-check-circle-fill me-2"></i>
              العربية
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
              <i class="bi bi-check-circle-fill me-2 invisible"></i>
              English
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('lang.switch', 'fr') }}">
              <i class="bi bi-check-circle-fill me-2 invisible"></i>
              Français
            </a>
          </li>
        </ul>
      </div>

    @else
      <!-- ENGLISH/FRENCH LAYOUT: Logo LEFT | Centered Menu | Settings RIGHT -->
      <a class="navbar-brand me-auto" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="80" height="45">
      </a>

      <!-- Centered menu -->
      <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav gap-3 text-center">
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('/') ? 'active' : '' }}"
              href="{{ url('/') }}#index">{{ __('Home') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('news') ? 'active' : '' }}"
              href="{{ url('/') }}#news">{{ __('News') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('shahid') ? 'active' : '' }}"
              href="{{ url('/') }}#shahid">{{ __('Watch') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('sport') ? 'active' : '' }}"
              href="{{ url('/') }}#sport">{{ __('Sports') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('ai') ? 'active' : '' }}"
              href="{{ url('/') }}#ai">{{ __('AI News') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light noto-sans-arabic px-3 {{ request()->is('amusing') ? 'active' : '' }}"
              href="{{ url('/') }}#amusing">{{ __('Diverse') }}</a>
          </li>
        </ul>
      </div>

      <div class="dropdown ms-3">
        <button class="btn btn-outline-light" type="button" id="settingsMenuButton" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="bi bi-grid-fill"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="settingsMenuButton">
          <li>
            <button class="dropdown-item" id="themeToggle">
              {{ __('Light/Dark') }}
              <i class="fa-solid fa-circle-half-stroke" style="color: #fcfcfc;"></i>
            </button>
          </li>
          <li>
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal">
              {{ __('Contact Us') }}
              <i class="fa fa-envelope me-2 contact_text_menu"></i>
            </button>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <div class="dropdown-item">
              <strong>{{ __('Language:') }}</strong>
            </div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}">
              <i class="bi bi-check-circle-fill me-2 invisible"></i>
              العربية
            </a>
          </li>
          <li>
            <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}">
              <i class="bi bi-check-circle-fill me-2 {{ app()->getLocale() == 'en' ? '' : 'invisible' }}"></i>
              English
            </a>
          </li>
          <li>
            <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ route('lang.switch', 'fr') }}">
              <i class="bi bi-check-circle-fill me-2 {{ app()->getLocale() == 'fr' ? '' : 'invisible' }}"></i>
              Français
            </a>
          </li>
        </ul>
      </div>
    @endif

  </div>
</nav>

<!-- Mobile navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top d-lg-none">
  <div class="container-fluid">
    @if(app()->getLocale() == 'ar')
      <!-- Arabic: Logo LEFT, Menu Button RIGHT -->
      <a class="navbar-brand me-auto" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" height="45">
      </a>
      <button class="btn btn-outline-light ms-2" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
        <i class="bi bi-list"></i>
      </button>
    @else
      <!-- English/French: Logo LEFT, Menu Button RIGHT -->
      <a class="navbar-brand me-auto" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" height="45">
      </a>
      <button class="btn btn-outline-light ms-2" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
        <i class="bi bi-list"></i>
      </button>
    @endif
  </div>
</nav>

<!-- Offcanvas (mobile menu) -->
<div class="offcanvas offcanvas-start bg-dark text-white d-flex flex-column" tabindex="-1" id="offcanvasMenu">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">{{ __('Menu') }}</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column justify-content-between">
    <!-- Menu links -->
    <ul class="navbar-nav flex-grow-1">
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#index">{{ __('Home') }}</a>
      </li>
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#news">{{ __('News') }}</a>
      </li>
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#shahid">{{ __('Watch') }}</a>
      </li>
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#sport">{{ __('Sports') }}</a>
      </li>
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#ai">{{ __('AI News') }}</a>
      </li>
      <li class="nav-item mb-3 border-bottom pb-2">
        <a class="nav-link text-white fw-bold fs-5" href="{{ url('/') }}#amusing">{{ __('Diverse') }}</a>
      </li>
    </ul>

    <!-- Settings button at the bottom -->
    <div class="mt-auto">
      <div class="dropdown mb-3">
        <button class="btn btn-outline-light w-100" type="button" id="mobileSettingsMenu" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="bi bi-grid-fill me-2"></i>
          {{ __('Settings') }}
        </button>
        <ul class="dropdown-menu dropdown-menu-dark w-100" aria-labelledby="mobileSettingsMenu">
          <li>
            <button class="dropdown-item" id="themeToggleMobile">
              {{ __('Light/Dark') }}
              <i class="fa-solid fa-circle-half-stroke" style="color: #fcfcfc;"></i>
            </button>
          </li>
          <li>
            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal">
              {{ __('Contact Us') }}
              <i class="fa fa-envelope me-2 contact_text_menu"></i>
            </button>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <div class="dropdown-item">
              <strong>{{ __('Language:') }}</strong>
            </div>
          </li>
          <li>
            <a class="dropdown-item {{ app()->getLocale() == 'ar' ? 'active' : '' }}" href="{{ route('lang.switch', 'ar') }}">
              <i class="bi bi-check-circle-fill me-2 {{ app()->getLocale() == 'ar' ? '' : 'invisible' }}"></i>
              العربية
            </a>
          </li>
          <li>
            <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('lang.switch', 'en') }}">
              <i class="bi bi-check-circle-fill me-2 {{ app()->getLocale() == 'en' ? '' : 'invisible' }}"></i>
              English
            </a>
          </li>
          <li>
            <a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ route('lang.switch', 'fr') }}">
              <i class="bi bi-check-circle-fill me-2 {{ app()->getLocale() == 'fr' ? '' : 'invisible' }}"></i>
              Français
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll(".navbar-nav .btn");

  navLinks.forEach(link => {
    link.addEventListener("click", function () {
      navLinks.forEach(l => l.classList.remove("active"));
      this.classList.add("active");
    });
  });
});
</script>

@include('pages.components.contact')



