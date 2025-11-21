@extends('frontend.layouts.app')

@section('content')
    <!-- Lines -->
    <section class="content-lines-wrapper">
        <div class="content-lines-inner">
            <div class="content-lines"></div>
        </div>
    </section>
    <!-- Header Banner -->
    <section class="banner-header banner-img bg-img bg-fixed pb-0" data-background="img/banner.jpg"
        data-overlay-darkgray="5">
        <!-- Left Panel -->
        <div class="left-panel"></div>
    </section>
    <!-- Projects -->
    <section class="projects section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Our <span>Projects</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/projects/1.jpg" alt=""> </div>
                        <div class="con">
                            <h6><a href="{{ route('projects_1') }}">Interior</a></h6>
                            <h5><a href="{{ route('projects_1') }}">Cotton House</a></h5>
                            <div class="line"></div> <a href="{{ route('projects_1') }}"><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/projects/2.jpg" alt=""> </div>
                        <div class="con">
                            <h6><a href="armada-center.html">Exterior</a></h6>
                            <h5><a href="armada-center.html">Armada Center</a></h5>
                            <div class="line"></div> <a href="armada-center.html"><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/projects/3.jpg" alt=""> </div>
                        <div class="con">
                            <h6><a href="stonya-villa.html">Urban</a></h6>
                            <h5><a href="stonya-villa.html">Stonya Villa</a></h5>
                            <div class="line"></div> <a href="stonya-villa.html"><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/projects/4.jpg" alt=""> </div>
                        <div class="con">
                            <h6><a href="prime-hotel.html">Interior</a></h6>
                            <h5><a href="prime-hotel.html">Prime Hotel</a></h5>
                            <div class="line"></div> <a href="prime-hotel.html"><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.partials.footer')
@endsection