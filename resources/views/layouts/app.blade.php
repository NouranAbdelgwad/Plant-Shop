<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Layout')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
        <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnYX48-BzXud6JOetupQdlLJbEhimFRx5NWw&s"
        sizes="32x32">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid nav-border">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/">
                        <h3>Green Store</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link home-nav" href="/">Home</a>
                            <a class="nav-link home-nav" href="/plants">Plants</a>
                            <a class="nav-link home-nav" href="/about">About</a>
                            <a class="nav-link home-nav" href="/contact">Contact</a>
                            <a class="nav-link text-light home-nav" href="/cart">
                                <b class="bi">{{$cartTotal}}</b>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z" />
                                </svg></a>
                            <a class="nav-link " href="#">
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                </svg>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                </svg>
                                            </a>
                                    @endif
                                @endauth
                        </div>
                        </a>
                    </div>
            </div>
            </nav>
        </div>
    </div>
    @yield('content')
    <footer>
        <br><br>
        <nav class="navbar navbar-expand-lg footer-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  footer-text" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  footer-text" href="/plants">Plants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  footer-text" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  footer-text" href="/contact">Contact</a>
                </li>
            </ul>
        </nav>
        <br>
        <br>
        <h5>Subscribe to our newsletter</h5>
        <div class="input-btn">
            <input type="text" placeholder=" Your Email Address.." class="address-input" class="col-9">
            <button class="green-btn" class="col-3">Subscribe</button>
        </div>
        <br><br>
        <hr>
        <br><br>
        <p>© {{ date('Y') }} Plant Shop. Powered by Plant Shop.</p>
    </footer>
    </div>

</body>

</html>
