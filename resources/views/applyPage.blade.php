<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>apply</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/dulogoNew_2.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}

</head>

<body>
    @if (session()->has('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.html">DUHRM</a></h1>

                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                @include('partials._header')
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= FeatPricingures Section ======= -->
        <div class="hero-section inner-page">
            <div class="wave">

                <svg width="1920px" height="400px" viewBox="0 0 1920 265" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                            <path
                                d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                                id="Path"></path>
                        </g>
                    </g>
                </svg>

            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center hero-text">
                                <h1 data-aos="fade-up" data-aos-delay="">Announcement</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <section class="section m-0 p-0">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        @foreach ($posts as $post)
                            <div class="card shadow mb-3 m-3 ms-5" style="width:80%;">
                                <div class="card-body text-secondary">
                                    <h5 class="card-title fw-bolder fs-2 text-dark">{{ $post->title }}</h5>
                                    <div class="row">

                                        <p class="card-text col-8">{{ $post->description }}</p>
                                        <a href="{{ route('apply.job', $post->id) }}"
                                            class="btn bg-primary col-3  p-0 text-light">Apply</a>
                                        <div class="table">
                                            <td><span class="fw-bolder text-primary">department:</span></td>
                                            <td>{{ $post->department }}</td>
                                            <td><span class="ms-5 fs-3text-dark bg-light">{{ $post->type }}</span>
                                            </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div style="width:25%; margin-left:10%;">
                            {{ $posts->links() }}
                        </div>

                    </div>
                    <div class="col-4">
                        <form action="{{ route('search.job') }}" method="GET">
                            <div class="input-group w-75">
                                <input type="text" name="query" placeholder="Search..." class="form-control rounded" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-primary">search</button>
                            </div>
                        </form>
                    </div>

                </div>
        </section>


    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstraps.js') }}"></script>
    <script src="{{ asset('toaster/jquery-1.91.js') }}"></script>
    <script src="{{ asset('toaster/jquery-migrate.js') }}"></script>
    <link href="{{ asset('toaster/toaster.css') }}" rel="stylesheet" />
    <script src="{{ asset('toaster/toaster.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstraps.js') }}"></script>
    <script src="{{ asset('toaster/jquery-1.91.js') }}"></script>
    <script src="{{ asset('toaster/jquery-migrate.js') }}"></script>
    <link href="{{ asset('toaster/toaster.css') }}" rel="stylesheet" />
    <script src="{{ asset('toaster/toaster.js') }}"></script>
    @include('partials._footer')
</body>
</div>

</html>
