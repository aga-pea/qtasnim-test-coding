<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('styles') <!-- For additional styles -->
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">My Application</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Transaksi</a>
                    </li>
                    <!-- Add more links as needed -->
                </ul>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-4">
        @yield('content') <!-- This is where the content of individual views will be injected -->
    </main>

    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
    </footer>

    @stack('scripts') <!-- For additional scripts -->
</body>
</html>