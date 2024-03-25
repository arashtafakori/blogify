@extends('layouts.app')
@section('content')
    <style>
        .bg-light-20 {
            background-color: rgba(255, 255, 255, 0.20);
        }
    </style>

    <div class="content  ">
        <row>
            <div class="container-fluid
             d-flex justify-content-center align-items-center">
                <h3 style="color: rgb(86, 86, 86);">
                    Welcome to the delicious world of foods
                </h3>
            </div>
            <br>
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div id="carouselExampleCaptions" class="carousel slide" style="width: 40%;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/seafood_chorizo_paella-1024x819.jpg') }}" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block bg-light-20">
                                <h5>Spicy Seafood & Chorizo Paella</h5>
                                <p>Rice, Pasta & Noodle Seafood</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/warm_potato_salad-1024x819.jpg') }}" class="d-block w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block bg-light-20">
                                <h5>Warm Potato Salad</h5>
                                <p>Appetizer & Snack Vegetarian & Vegan</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </row>

    </div>
@endsection

















{{-- <body>
    <div>
        <header>

            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="mt-6">

        </main>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        </footer>
    </div>
</body>

</html> --}}
