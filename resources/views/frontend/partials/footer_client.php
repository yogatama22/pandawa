<!-- Promo video - Testiominals -->
<section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/1.jpg"
        data-overlay-dark="3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="vid-area">
                        <div class="vid-icon">
                            <a class="play-button vid" href="<?php echo $contact->youtube_url ?? '' ?>">
                                <svg class="circle-fill">
                                    <circle cx="43" cy="43" r="39" stroke="#fff" stroke-width=".5"></circle>
                                </svg>
                                <svg class="circle-track">
                                    <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1" fill="none"></circle>
                                </svg> <span class="polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                        <div class="cont mt-15 mb-30">
                            <h5>View promo video</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="testimonials-box animate-box" data-animate-effect="fadeInUp">
                        <div class="head-box">
                            <h4>What Client's Say ?</h4>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <div class="item"> <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>Architect dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the
                                    lemon sanleo nec feugiat erat hendrerit necuis ve ante.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/1.jpg" alt=""> </div>
                                    <div class="cont">
                                        <h6>Jason Brown</h6> <span>Crowne Plaza Owner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item"> <span class="quote">
                                    <img src="img/quot.png" alt="">
                                </span>
                                <p>Interior dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the
                                    lemon sanleo nec feugiat erat hendrerit necuis ve ante.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/2.jpg" alt=""> </div>
                                    <div class="cont">
                                        <h6>Emily White</h6> <span>Armada Owner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item"> <span class="quote">
                                    <img src="img/quot.png" alt="">
                                </span>
                                <p>Urban dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the lemon
                                    sanleo nec feugiat erat hendrerit necuis ve ante.</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/4.jpg" alt=""> </div>
                                    <div class="cont">
                                        <h6>Jesica Smith</h6> <span>Alsa Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Clients -->
<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="owl-carousel owl-theme">
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/1.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/2.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/3.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/4.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/5.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="img/clients/6.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="main-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Phone</h6>
                    </div>
                    <p><?php echo $contact->phone ?? '' ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Email</h6>
                    </div>
                    <p><?php echo $contact->email ?? '' ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Our Address</h6>
                    </div>
                    <p><?php echo $contact->address ?? '' ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-left">
                        <p>© 2025 <?php echo $company->company_name ?? 'Pandawa Renjana' ?> All right reserved.</p>
                    </div>
                </div>
                <div class="col-md-4 abot">
                    <div class="social-icon"> <a href="<?php echo $contact->facebook_url ?? '' ?>"><i
                                class="ti-facebook"></i></a> <a href="<?php echo $contact->twitter_url ?? '' ?>"><i
                                class="fa-brands fa-x-twitter"></i></a> <a href="<?php echo $contact->instagram_url ?? '' ?>"><i
                                class="ti-instagram"></i></a> <a href="<?php echo $contact->tiktok_url ?? '' ?>"><i
                                class="fa-brands fa-tiktok"></i></a> </div>
                </div>
                <div class="col-md-4">
                    <!-- <p class="right"><a href="#">Terms &amp; Conditions</a></p> -->
                </div>
            </div>
        </div>
    </div>
</footer>