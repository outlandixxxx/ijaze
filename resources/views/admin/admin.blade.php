<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link id="pagestyle" href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet" />

      @include('components.head.tinymce-config')

</head>

<body >

    <!-- Banner -->
<a href="https://ijazplus.com/" class="btn w-full btn-primary text-truncate rounded-0 py-2 border-0 position-relative" style="z-index: 1000;">
    <strong>www.ijazeplus.com  : </strong> The Site Web →
</a>
  
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
 @include('admin.navbar') 

 <div class="container mt-20">
@yield('content')
 </div>


</div>

    <script src="{{asset('js/popper.min.js')}}">  </script>
    <script src="{{asset('js/bootstrap.min.js')}}"> </script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"> </script>
</body>

</html>
