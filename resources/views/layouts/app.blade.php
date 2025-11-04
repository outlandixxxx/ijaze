<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" 
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" 
      data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IjazePlus</title>

    <!-- Google Fonts (Arabic) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    

    <!-- Dynamic CSS based on direction -->
    @if(app()->getLocale() == 'ar')
        @vite(['resources/css/app-rtl.css', 'resources/js/app.js'])
    @else
        {{-- English and French both use LTR --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

</body>

</html>
