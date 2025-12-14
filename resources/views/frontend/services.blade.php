@extends('frontend.layouts.app')

@section('content')
    <section class="content-lines-wrapper">
        <div class="content-lines-inner">
            <div class="content-lines"></div>
        </div>
    </section>
    <!-- Header Banner -->
    <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-darkgray="5"
        data-background="img/banner.jpg">
        <!-- Left Panel -->
        <div class="left-panel"></div>
    </section>
    <section class="services section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Our <span>Services</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="architecture.html"> <img src="img/icons/icon-1.png" alt="">
                            <h5>Architecture</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">01</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="interior-design.html"> <img src="img/icons/icon-2.png" alt="">
                            <h5>Interior Design</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">02</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="urban-design.html"> <img src="img/icons/icon-3.png" alt="">
                            <h5>Urban Design</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">03</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="planning.html"> <img src="img/icons/icon-4.png" alt="">
                            <h5>Planing</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">04</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="3d-modelling.html"> <img src="img/icons/icon-6.png" alt="">
                            <h5>3D Modelling</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">05</div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="decor-plan.html"> <img src="img/icons/icon-5.png" alt="">
                            <h5>Decor Plan</h5>
                            <div class="line"></div>
                            <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in the
                                vitae miss.</p>
                            <div class="numb">06</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.footer_client')
@endsection