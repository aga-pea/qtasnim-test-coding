<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Data Penjualan')</title>

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap') }}" rel="stylesheet">

    <link href="{{ asset('assets/fonts/icomoon/style.css?v=').time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css?v=').time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css?v=').time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css?v=').time() }}" rel="stylesheet">
    @stack('styles')
    
  </head>
  <body>
  

  <div class="content">
  <main role="main">
        @yield('content') <!-- This is where the content of individual views will be injected -->
    </main>
  </div>
    
    

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    @stack('scripts')
  </body>
</html>