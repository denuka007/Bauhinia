<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

     {{--Font Awesome--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{--Font Awesome--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">

    <style>
        a{
            text-decoration: none !important;
        }
        </style>

</head>
<body>
      @include('layouts.inc.frontnavbar')
     <div class="content">
        @yield('content')
     </div>

  <!-- Scripts -->
  <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" defer></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>

  <!-- Scripts for sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{ url('frontend/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ url('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>


   @if (session('status'))
   <script>
        swal("{{ session('status') }}");
    </script>
     @endif

  @yield('scripts')

</body>
</html>
