<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Shortener Link adalah tools gratis yang dikembangkan oleh Diskominfo Prov. Kalbar  untuk mempersingkat URL atau memperpendek tautan">
  <meta name="author" content="Diskominfo Prov.Kalbar">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PemProv Kalbar </title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
  
  @stack('css')

</head>
<body class="bg-default">
  <!-- Navbar -->
    @include('layouts.frontend.partial.navbar')
  <!-- End Navbar -->
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    @include('layouts.frontend.partial.header')
    <!-- End Header -->
    <!-- Page content -->
    @yield('content')
    <!-- End Page content -->
  </div>
    <!-- Footer -->
    @include('layouts.frontend.partial.footer')
    <!-- End Footer -->
    
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
  @stack('js')
</body>
</html>