@extends('layouts.softland')
@section('content')
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">
    <div class="wave">

        <svg width="100%" height="455px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path
                        d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z"
                        id="Path"></path>
                </g>
            </g>
        </svg>

    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 data-aos="fade-right">Dilla University Human Resource Office</h1>
                        <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p>
                        <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="{{ route('applypage') }}"
                                class="btn btn-outline-white">apply</a></p>
                    </div>
                    <div class="col-lg-4 iphone-wrap">
                        <img src="{{ asset('assets/img/hr3t.png') }}" alt="Image" class="phone-1"
                            data-aos="fade-right" style="width:500px;">
                        <!--<img src="assets/img/hr2.jpg" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Home Section ======= -->
    <section class="section">
        <div class="container">

            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-5" data-aos="fade-up">
                    <h2 class="section-heading">Save your time apply online</h2>
                </div>
            </div>



        </div>
    </section>

    <section class="section">

        <div class="container">
            <div class="row justify-content-center text-center mb-5" data-aos="fade">
                <div class="col-md-6 mb-5">

                </div>
            </div>


    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 me-auto">
                    <h2 class="mb-4">Apply Online</h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                        reprehenderit optio,
                        laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                        incidunt
                        dolore mollitia esse natus beatae.</p>

                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/undraw_svg_2.svg') }}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 ms-auto order-2">
                    <h2 class="mb-4">Check Your Result Online</h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur at
                        reprehenderit optio,
                        laudantium eius quod, eum maxime molestiae porro omnis. Dolores aspernatur delectus impedit
                        incidunt
                        dolore mollitia esse natus beatae.</p>

                </div>
                <div class="col-md-6" data-aos="fade-right">
                    <img src="{{ asset('assets/img/undraw_svg_3.svg') }}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection


