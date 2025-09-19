<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FutureNav - Navbar Only</title>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">



</head>


<style>

    /* Navbar base */
    #navbar, .d-lg-none {
      background-color: rgba(17, 24, 39, 0.7);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(99, 102, 241, 0.3);
      transition: all 0.3s ease;
      z-index: 50;
    }

    /* Navbar scrolled effect */
    #navbar.scrolled {
      background-color: rgba(17, 24, 39, 0.9);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    /* Nav links */
    .nav-link, .mobile-nav-link {
      color: #f3f4f6;
      border: 1px solid transparent;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .nav-link:hover, .mobile-nav-link:hover {
      color: #06b6d4;
      border: 1px solid #06b6d4;
      text-shadow: 0 0 8px rgba(6,182,212,0.3);
    }

    /* Active nav button */
    .nav-link.active, .mobile-nav-link.active {
      color: #06b6d4;
      border: 1px solid #06b6d4;
      box-shadow: 0 0 15px rgba(6,182,212,0.5);
    }

    /* Mobile menu open */
    #mobile-menu.open {
      height: auto;
    }

    /* Hamburger animation */
    #mobile-menu-button.active #line1 {
      transform: translate(-50%, -50%) rotate(45deg);
    }
    #mobile-menu-button.active #line2 { opacity: 0; }
    #mobile-menu-button.active #line3 {
      transform: translate(-50%, -50%) rotate(-45deg);
    }


    </style>
<body>



<!-- Desktop Navbar -->
<nav id="navbar" class="fixed top-0 left-0 right-0 bg-gray-900/70 backdrop-blur-lg border-b border-cyan-500/30 z-50 transition-all duration-300 d-none d-lg-flex">
    <div class="container mx-auto px-6 py-3 flex items-center justify-between">
      <!-- Brand -->
      <a class="navbar-brand flex-shrink-0" href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo" width="200" height="80"></a>

      <!-- Nav links -->
      <ul class="flex items-center gap-3 text-center">
        <li><a class="nav-link px-4 py-2 rounded-full" href="{{ '/' }}#amusing">ترفيه</a></li>
        <li><a class="nav-link px-4 py-2 rounded-full" href="{{ '/' }}#ai">AI اخبار</a></li>
        <li><a class="nav-link px-4 py-2 rounded-full" href="{{ '/' }}#sport">رياضة</a></li>
        <li><a class="nav-link px-4 py-2 rounded-full" href="{{ '/' }}#trending">تريندينغ</a></li>
        <li><a class="nav-link px-4 py-2 rounded-full" href="{{ '/' }}#breakingnews">اخبار عاجلة</a></li>
        <li><a class="nav-link px-4 py-2 rounded-full active" href="{{ '/' }}#index">الرئيسية</a></li>
      </ul>
    </div>
  </nav>

  <!-- Mobile Navbar -->
  <nav class="fixed top-0 left-0 right-0 bg-gray-900/70 backdrop-blur-lg border-b border-cyan-500/30 z-50 d-lg-none">
    <div class="container-fluid flex items-center justify-between px-4 py-2">
      <button id="mobile-menu-button" class="relative w-10 h-10 focus:outline-none group" aria-label="Toggle menu">
        <div class="absolute w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
          <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transition duration-300" id="line1"></span>
          <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transition duration-300" id="line2"></span>
          <span class="block h-0.5 w-5 bg-cyan-400 transition duration-300" id="line3"></span>
        </div>
      </button>
      <a class="navbar-brand flex-shrink-0" href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo" width="150" height="60"></a>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="overflow-hidden h-0 transition-all duration-300 ease-in-out">
      <ul class="flex flex-col gap-2 p-4">
        <li><a class="mobile-nav-link px-4 py-2 rounded-full" href="{{ '/' }}#amusing">ترفيه</a></li>
        <li><a class="mobile-nav-link px-4 py-2 rounded-full" href="{{ '/' }}#ai">AI اخبار</a></li>
        <li><a class="mobile-nav-link px-4 py-2 rounded-full" href="{{ '/' }}#sport">رياضة</a></li>
        <li><a class="mobile-nav-link px-4 py-2 rounded-full" href="{{ '/' }}#trending">تريندينغ</a></li>
        <li><a class="mobile-nav-link px-4 py-2 rounded-full" href="{{ '/' }}#breakingnews">اخبار عاجلة</a></li>
        <li><a class="mobile-nav-link px-4 py-2 rounded-full active" href="{{ '/' }}#index">الرئيسية</a></li>
      </ul>
    </div>
  </nav>





<script>
    document.addEventListener('DOMContentLoaded', () => {
      const navbar = document.getElementById('navbar');
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const navLinks = document.querySelectorAll('.nav-link');
      const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
      const sections = document.querySelectorAll('section');

      // Mobile menu toggle
      mobileMenuButton.addEventListener('click', () => {
        mobileMenuButton.classList.toggle('active');
        if (mobileMenu.classList.contains('open')) {
          mobileMenu.classList.remove('open');
          mobileMenu.style.height = '0';
        } else {
          mobileMenu.classList.add('open');
          mobileMenu.style.height = `${mobileMenu.scrollHeight}px`;
        }
      });

      // Close mobile menu on link click
      mobileNavLinks.forEach(link => link.addEventListener('click', () => {
        mobileMenuButton.classList.remove('active');
        mobileMenu.classList.remove('open');
        mobileMenu.style.height = '0';
      }));

      // Scroll effect
      window.addEventListener('scroll', () => {
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
        highlightCurrentSection();
      });

      // Highlight active section
      function highlightCurrentSection() {
        let current = '';
        sections.forEach(section => {
          if (window.scrollY >= section.offsetTop - 100 && window.scrollY < section.offsetTop + section.offsetHeight)
            current = section.getAttribute('id');
        });

        navLinks.forEach(link => link.classList.remove('active'));
        mobileNavLinks.forEach(link => link.classList.remove('active'));

        navLinks.forEach(link => { if(link.getAttribute('href').includes(current)) link.classList.add('active'); });
        mobileNavLinks.forEach(link => { if(link.getAttribute('href').includes(current)) link.classList.add('active'); });
      }

      highlightCurrentSection();
    });
    </script>


</body>
</html>
