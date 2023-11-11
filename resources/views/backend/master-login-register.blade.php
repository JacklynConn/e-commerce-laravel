<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="backend/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('backend/img/favicon/favicon.ico')}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="{{url('https://fonts.googleapis.com')}}" />
    <link rel="preconnect" href="{{url('https://fonts.gstatic.com')}}" crossorigin />
    <link href="{{url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap')}}"rel="stylesheet">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url('backend/vendor/fonts/boxicons.css')}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('backend/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('backend/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('backend/css/demo.css')}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{url('backend/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{url('backend/vendor/js/helpers.js')}}"></script>
    <script src="{{url('backend/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    @yield('content')

    <!-- / Content -->

    <script src="{{url('backend/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('backend/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('backend/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('backend/vendor/js/menu.js')}}"></script>
    <!-- Main JS -->
    <script src="{{url('backend/js/main.js')}}"></script>
    <!-- Page JS -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="{{url('https://buttons.github.io/buttons.js')}}"></script>
  </body>
</html>
