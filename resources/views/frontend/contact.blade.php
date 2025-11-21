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
    <!-- Contact -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Contact <span>Us</span></h2>
                </div>
            </div>
            <div class="row mb-90">
                <div class="col-lg-4 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <p><b>Bauen Architecture Firm</b></p>
                    <p>Our firm nisl sodales sit amet sapien idea placerat sodales orcite. Vivamus ne miss rhoncus felis
                        bauen architecture.</p>
                    <p><b>VAT :</b> USA002323065B06</p>
                </div>
                <div class="col-lg-4 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <p><b>Contact Details</b></p>
                    <p><b>Phone :</b> +1 203-123-0606</p>
                    <p><b>Email :</b> architecture@bauen.com</p>
                    <p><b>Address :</b> 24 King St, Charleston, 29401 USA</p>
                </div>
                <div class="col-lg-4 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <p><b>Contact Form</b></p>
                    <form method="post" class="contact__form"
                        action="https://duruthemes.com/demo/html/bauen/multipage-dark/mail.php">
                        <!-- Form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                            </div>
                        </div>
                        <!-- Form elements -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" placeholder="Your Number *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="subject" type="text" placeholder="Subject *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *"
                                    required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Map Section -->
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13419.040333881774!2d-79.93218134282569!3d32.77209999120473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a1ae84ff639%3A0xe5c782f71924a526!2s24%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1635894790855!5m2!1str!2str"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.partials.footer')
@endsection