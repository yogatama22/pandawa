@extends('frontend.layouts.app')

@section('content')
    <!-- Lines -->
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
    <!-- About -->
    <section class="about section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">About <span>Pandawa Renjana</span></h2>
                    <p>Kami adalah perusahaan yang bergerak di bidang arsitektur, desain interior, dan konstruksi, yang
                        berkomitmen menghadirkan karya berkualitas tinggi melalui perpaduan antara inovasi, estetika, dan
                        fungsionalitas. Kami menyediakan layanan terpadu (one stop service) mulai dari tahap perancangan
                        konsep, pengelolaan proyek, hingga penyelesaian akhir, agar setiap klien memperoleh hasil sesuai
                        kebutuhan dan impian mereka.</p>
                    <p>Dalam bidang arsitektur, Pandawa Renjana menawarkan solusi perancangan bangunan menyeluruh, mulai
                        dari konsep awal hingga penyelesaian detail teknis, dengan fokus pada keberlanjutan dan kenyamanan
                        pengguna.</p>
                    <p>Pada desain interior, kami percaya bahwa ruang yang dirancang dengan baik mampu meningkatkan kualitas
                        hidup dan produktivitas. Setiap karya kami mencerminkan kepribadian klien serta menghadirkan harmoni
                        antara fungsi dan estetika.
                        Sebagai kontraktor, kami bertanggung jawab penuh atas pelaksanaan proyek dengan memastikan setiap
                        tahapan berjalan sesuai standar kualitas tertinggi, anggaran yang disepakati, dan jadwal yang tepat
                        waktu.</p>
                </div>
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="about-img">
                        <div class="img"> <img src="img/about.jpg" class="img-fluid" alt=""> </div>
                        <div class="about-img-2 about-buro">Tulungagung Office</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Our <span>Team</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 owl-carousel owl-theme">
                    <div class="item">
                        <div class="img"> <img src="img/team/1.jpg" alt=""></div>
                        <div class="info">
                            <h6>Jason Brown</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>dipl. Arch ETH/SIA</p> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i
                                            class="ti-twitter-alt"></i></a> <a href="#"><i class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"> <img src="img/team/2.jpg" alt=""></div>
                        <div class="info">
                            <h6>Emily White</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>dipl. Arch FH</p> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i
                                            class="ti-twitter-alt"></i></a> <a href="#"><i class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"> <img src="img/team/3.jpg" alt=""></div>
                        <div class="info">
                            <h6>Enrico Samara</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>M.A. FH in Architecture</p> <a href="#"><i class="ti-facebook"></i></a> <a
                                        href="#"><i class="ti-twitter-alt"></i></a> <a href="#"><i
                                            class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"> <img src="img/team/4.jpg" alt=""></div>
                        <div class="info">
                            <h6>Jesica Smith</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>M.A. FH in Architecture</p> <a href="#"><i class="ti-facebook"></i></a> <a
                                        href="#"><i class="ti-twitter-alt"></i></a> <a href="#"><i
                                            class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"> <img src="img/team/5.jpg" alt=""></div>
                        <div class="info">
                            <h6>Olivia Brown</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>dipl. Arch FH</p> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i
                                            class="ti-twitter-alt"></i></a> <a href="#"><i class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"> <img src="img/team/6.jpg" alt=""></div>
                        <div class="info">
                            <h6>Fredia Martin</h6>
                            <p>Architect</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <p>M.A. FH in Architecture</p> <a href="#"><i class="ti-facebook"></i></a> <a
                                        href="#"><i class="ti-twitter-alt"></i></a> <a href="#"><i
                                            class="ti-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Career -->
    <section class="positions section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-30 text-center">
                    <h2 class="section-title">Job <span>Opening</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-60">
                    <div class="position"><a class="position-link" href="contact.html"></a>
                        <div class="position-title">Project Manager <span>Development</span></div>
                        <div class="position-location"><span>Location</span> New York, NY</div>
                        <div class="position-time">Employment Type <span>Full-time</span></div>
                        <div class="position-icon"><i class="ti-arrow-top-right"></i></div>
                    </div>
                    <div class="position"><a class="position-link" href="contact.html"></a>
                        <div class="position-title">Staff Design Architect <span>Development</span></div>
                        <div class="position-location"><span>Location</span> San Francisco, CA</div>
                        <div class="position-time">Employment Type <span>Full-time</span></div>
                        <div class="position-icon"><i class="ti-arrow-top-right"></i></div>
                    </div>
                    <div class="position"><a class="position-link" href="contact.html"></a>
                        <div class="position-title">Senior Exhibit Designer <span>Development</span></div>
                        <div class="position-location"><span>Location</span> New York, NY</div>
                        <div class="position-time">Employment Type <span>Full-time</span></div>
                        <div class="position-icon"><i class="ti-arrow-top-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p><small>Please submit a resume and cover letter with compensation history to
                            <b>architecture[at]bauen.com</b>.</small></p>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.footer')
@endsection