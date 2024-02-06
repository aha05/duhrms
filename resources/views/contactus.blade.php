<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contact-us</title>
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
    <link href="{{ asset('assets/contact.css') }}" rel="stylesheet">

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


    <!-- Scripts -->
    <script src="{{ asset('js/bootstraps.js') }}"></script>
    <script src="{{ asset('toaster/jquery-1.91.js') }}"></script>
    <script src="{{ asset('toaster/jquery-migrate.js') }}"></script>
    <link href="{{ asset('toaster/toaster.css') }}" rel="stylesheet" />
    <script src="{{ asset('toaster/toaster.js') }}"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.html">DUHRM</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                @include('partials._header')
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <section class="hero-section inner-page">
            <div class="wave">

                <svg width="1920px" height="365px" viewBox="0 0 1920 265" version="1.1"
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
                                <h1 data-aos="fade-up" data-aos-delay="">contact us</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section">
            <div class="container">
                <div class="row mb-5 align-items-end">


                </div>



                <div class="container">


                    <div class="form">

                        <div class="contact-info">
                            <h3 class="title">Let's get in touch</h3>
                            <p class="text">

                            Thank you for reaching out to us. We value your feedback, inquiries, and suggestions.
                             Please use the contact information provided below to get in touch with our team.
                             We are here to assist you and will respond as promptly as possible.
                            </p>

                            <div class="info">
                                <div class="information">
                                    <i class="fa-solid fa-map-location-dot icon"></i>
                                    <p>Dilla, Ethiopia </p>
                                </div>
                                <div class="information">
                                    <i class="fa-solid fa-envelope icon"></i>
                                    <p>dillauniversity@gmail.com</p>
                                </div>
                                <div class="information">
                                    <i class="fa-solid fa-phone-volume icon"></i>
                                    <p>+2519-09-09-09-09</p>
                                </div>
                            </div>


                        </div>
                        <div class="contact-form">
                            <div class="circle one"></div>
                            <div class="circle two"></div>

                            <form method="POST" action="{{ route('feedback') }}">
                                @csrf
                                @if (session()->has('success'))
                                    <div class="alert alert-light text-success">{{ session('success') }}</div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <h3 class="title">Contact Us</h3>

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-3 col-form-label text-md-end text-light">{{ __('Name') }}</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                            class="input form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-3 col-form-label text-md-end text-light">{{ __('Email') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="input form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone"
                                        class="col-md-3 col-form-label text-md-end text-light">{{ __('Phone') }}</label>

                                    <div class="col-md-8">
                                        <input id="phone" type="phone"
                                            class="input form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" autocomplete="phone"
                                            autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="message"
                                        class="col-md-3 col-form-label text-md-end text-light">{{ __('Message') }}</label>

                                    <div class="col-md-8">
                                        <textarea id="message" type="message" class="input form-control @error('message') is-invalid @enderror"
                                            name="message" value="{{ old('message') }}" autocomplete="message" autofocus rows="3"></textarea>

                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="submit" value="Send" class="btn" style="margin-left: 30%" />
                            </form>
                        </div>
                    </div>
                </div>


            </div>

            </div>
            </div>
        </section>



    </main><!-- End #main -->

    @include('partials._footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
</body>

</html>
