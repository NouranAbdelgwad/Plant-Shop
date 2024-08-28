<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnYX48-BzXud6JOetupQdlLJbEhimFRx5NWw&s"
    sizes="32x32">
    <title>Green Store</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="home-background">
                <div class="container-fluid">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand text-light" href="/"><h3>Green Store</h3></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav ms-auto">
                                    <a class="nav-link home-nav text-light" aria-current="page" href="#">Home</a>
                                    <a class="nav-link home-nav text-light" href="/plants">Plants</a>
                                    <a class="nav-link text-light home-nav" href="/about">About</a>
                                    <a class="nav-link text-light home-nav" href="/contact">Contact</a>
                                    @if (Auth::check() && Auth::user()->is_admin)
                                    <a class="nav-link home-nav" href="/dashboard">Dashboard</a>
                                    @endif
                                    <a class="nav-link text-light home-nav" href="/cart">
                                        <b class="bi">{{$cartTotal}}</b>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z" />
                                        </svg></a>
                                    <a class="nav-link text-light home-nav" aria-disabled="true">
                                        @if (Route::has('login'))
                                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                                @auth
                                                    <a href="{{ url('/dashboard') }}" class="text-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-person-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="text-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-person-fill"
                                                            viewBox="0 0 16 16">
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
                    <div class="content text-center">
                        <h5>Welcome To The Greenstore</h5>
                        <br>
                        <div class="title">Let's Bring the Spring to Your Home</div>
                        <br>
                        <a href="/plants">
                            <button class="shop-btn">
                                Shop Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1>New Plants</h1>
            <a href="/plants"><button class="green-btn">Shop Now</button></a>
        </div>
        <br>
        <div class="products">
            @foreach ($plants as $plant)
            <a href="plants/{{$plant->id}}" class="plant-card">
            <div class="plant">
                <img src="{{$plant->image_1}}"
                    class="plant-img" alt="plant">
                <div id="star-rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <h5>{{$plant->name}}</h5>
                <p class="text-secondary">{{$plant->category}}</p>
                <p><b>${{$plant->price}}</b></p>
            </a>
            </div>
            @endforeach

        </div>
    </div>
    <div class="container-fluid d-flex flex-column flex-md-row justify-content-between">
        <img src="https://www.bezzia.com/wp-content/uploads/2021/09/planta-768x511.jpeg"
            class="w-100 w-md-50 fit-cover" alt="plant">
        <div class="w-100 w-md-50 p-5">
            <h6>Our Story</h6>
            <h1>For People Who Love Plants</h1>
            <p>Vivamus quam sociis tristique diam at donec nisl, hendrerit leo nunc at velit lacinia porttitor a nulla
                tellus ultrices varius aliquet sed in placerat.
                Facilisis eu faucibus diam cursus pulvinar consectetur purus sem felis, mauris consectetur nisl vitae
                gravida ultricies sem condimentum aliquet ut sed gravida amet vitae euismod pulvinar volutpat laoreet
                pharetra.</p>
            <button class="green-btn">Read More</button>
        </div>
    </div>
    <div class="container mt-5">
        <div class="customers">
            <h1>What our Customers Say</h1>
            <div class="line"></div>
        </div>
        <div class="opinions d-flex justify-content-between w-100 mt-3">
            <div class="opinion text-center w-30">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-quote" viewBox="0 0 16 16">
                    <path
                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
                </svg>
                <p><b>Sed odio donec curabitur auctor amet tincidunt non odio enim felis tincidunt amet morbi egestas
                        hendrerit.</b></p>
                <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-testimonial-avatar-img.jpg"
                    alt="person" class="person-img">
                <p><b>JENIFER LUWES</b></p>
            </div>
            <div class="opinion text-center w-30">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-quote" viewBox="0 0 16 16">
                    <path
                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
                </svg>
                <p><b>Sed odio donec curabitur auctor amet tincidunt non odio enim felis tincidunt amet morbi egestas
                        hendrerit.</b></p>
                <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-testimonials-avatar-img-2.jpg"
                    alt="person" class="person-img">
                <p><b>ALICIA HEART</b></p>
            </div>
            <div class="opinion text-center w-30">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-quote" viewBox="0 0 16 16">
                    <path
                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
                </svg>
                <p><b>Sed odio donec curabitur auctor amet tincidunt non odio enim felis tincidunt amet morbi egestas
                        hendrerit.</b></p>
                <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-testimonials-avatar-img-1.jpg"
                    alt="person" class="person-img">
                <p><b>JUAN CARLOS</b></p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="gift-background">
            <div class="container-fluid">
                <div class="content text-center">
                    <h5>GIFT CARD</h5>
                    <br>
                    <div class="title">Give the Gift of Greenery</div>
                    <br>
                    <p>Pretium tortor risus enim neque quis pellentesque maecenas proin odio eget arcu </p>
                    <br>
                    <button class="shop-btn">
                        Purchase A Gift Card
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="row p-3">
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-lock-fill green-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                    </div>
                    <div class="col-9">
                        <h4>Secure Payment</h4>
                        <p>Curabitur interdum, nisl at tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="row benifit p-3">
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-box2-heart-fill green-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM8.5 4h6l.5.667V5H1v-.333L1.5 4h6V1h1zM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                        </svg>
                    </div>
                    <div class="col-9">
                        <h4>Delivered With Care</h4>
                        <p>Curabitur interdum, nisl at tincidunt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="row p-3">
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-envelope-heart-fill green-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z" />
                            <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                        </svg>
                    </div>
                    <div class="col-9">
                        <h4>Excellent Service</h4>
                        <p>Curabitur interdum, nisl at tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <br><br>
        <nav class="navbar navbar-expand-lg footer-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plants">Plants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
        </nav>
        <br>
        <br>
        <h5>Subscribe to our newsletter</h5>
        <div class="input-btn">
            <input type="text" placeholder=" Your Email Address.." class="address-input" class="col-9">
            <button class="green-btn" class="col-3" >Subscribe</button>
        </div>
        <br><br>
        <hr>
        <br><br>
        <p>© {{date('Y')}} Plant Shop. Powered by Plant Shop.</p>
    </footer>
    </div>
</body>

</html>
