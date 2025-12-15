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
                            <?php if (isset($testimonials) && $testimonials->count() > 0): ?>
                                <?php foreach ($testimonials as $testimonial): ?>
                                    <div class="item">
                                        <span class="quote">
                                            <img src="img/quot.png" alt="">
                                        </span>

                                        <p>
                                            <?php
                                            // sesuaikan field isi testimonial
                                            echo $testimonial->testimonial ?? '';
                                            ?>
                                        </p>

                                        <div class="info">
                                            <div class="author-img">
                                                <?php if (!empty($testimonial->client_photo)): ?>
                                                    <img src="<?php echo Storage::url($testimonial->client_photo); ?>"
                                                        alt="<?php echo $testimonial->client_name; ?>">
                                                <?php else: ?>
                                                    <img src="img/team/default.jpg" alt="<?php echo $testimonial->client_name; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="cont">
                                                <h6><?php echo $testimonial->client_name; ?></h6>
                                                <span>
                                                    <?php
                                                    // jabatan / perusahaan (opsional)
                                                    echo $testimonial->client_position ?? $testimonial->client_company ?? '';
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <!-- Fallback jika belum ada testimonial -->
                                <div class="item">
                                    <span class="quote">
                                        <img src="img/quot.png" alt="">
                                    </span>
                                    <p>
                                        Belum ada testimonial dari klien. Kami selalu berkomitmen memberikan hasil terbaik
                                        untuk setiap proyek.
                                    </p>
                                    <div class="info">
                                        <div class="author-img">
                                            <img src="img/team/default.jpg" alt="Client">
                                        </div>
                                        <div class="cont">
                                            <h6>Our Client</h6>
                                            <span>Happy Customer</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
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
                <?php if (isset($clients) && $clients->count() > 0): ?>
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($clients as $client): ?>
                            <div class="clients-logo">
                                <?php if (!empty($client->website)): ?>
                                    <a href="<?php echo $client->website; ?>" target="_blank" title="<?php echo $client->name; ?>">
                                        <img src="<?php echo Storage::url($client->logo); ?>" alt="<?php echo $client->name; ?>">
                                    </a>
                                <?php else: ?>
                                    <a href="#" title="<?php echo $client->name; ?>">
                                        <img src="<?php echo Storage::url($client->logo); ?>" alt="<?php echo $client->name; ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <!-- Default clients jika belum ada data -->
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
                <?php endif; ?>
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
                                class="fa-brands fa-x-twitter"></i></a> <a
                            href="<?php echo $contact->instagram_url ?? '' ?>"><i class="ti-instagram"></i></a> <a
                            href="<?php echo $contact->tiktok_url ?? '' ?>"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <p class="right"><a href="#">Terms &amp; Conditions</a></p> -->
                </div>
            </div>
        </div>
    </div>
</footer>