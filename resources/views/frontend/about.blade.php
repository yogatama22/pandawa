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
                    <h2 class="section-title">About <span>{{ $company->company_name ?? 'Pandawa Renjana' }}</span></h2>
                    @if($about)
                        <p>{{ $about->description }}</p>
                        @if($about->mission)
                            <p><strong>Mission:</strong> {{ $about->mission }}</p>
                        @endif
                        @if($about->vision)
                            <p><strong>Vision:</strong> {{ $about->vision }}</p>
                        @endif
                    @else
                        <p>Kami adalah perusahaan yang bergerak di bidang arsitektur, desain interior, dan konstruksi, yang
                            berkomitmen menghadirkan karya berkualitas tinggi melalui perpaduan antara inovasi, estetika,
                            dan fungsionalitas.</p>
                        <p>Kami menyediakan layanan terpadu (one stop service) mulai dari tahap perancangan konsep,
                            pengelolaan proyek, hingga penyelesaian akhir, agar setiap klien memperoleh hasil sesuai
                            kebutuhan dan impian mereka.</p>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <div class="about-img">
                        <div class="img">
                            <img src="{{ $about && $about->image ? Storage::url($about->image) : asset('img/about.jpg') }}"
                                class="img-fluid" alt="{{ $company->company_name ?? 'About' }}">
                        </div>
                        <div class="about-img-2 about-buro">{{ $company->company_name ?? 'Our' }} Office</div>
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
                <!-- Left Side - Group Photo -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="img">
                        <img src="img/team/group-photo.jpg" alt="Team Group Photo"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>

                <!-- Right Side - Individual Members -->
                <div class="col-lg-6 col-md-12">
                    <!-- Pandawa Renjana Section -->
                    <div class="mb-4">
                        <h4 class="section-title3">Pandawa <span>Renjana</span></h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="item">
                                    <div class="img mb-2">
                                        <img src="img/team/1.jpg" alt="Fawzy Amal Fathrah"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="info text-center">
                                        <h6>Fawzy Amal Fathrah</h6>
                                        <p>Direktur</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="item">
                                    <div class="img mb-2">
                                        <img src="img/team/2.jpg" alt="Andro Kurnia Amanusa"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="info text-center">
                                        <h6>Andro Kurnia Amanusa</h6>
                                        <p>Komisaris</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Renjana Aterier Section -->
                    <div>
                        <h4 class="section-title3">Renjana Aterier</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="item">
                                    <div class="img mb-2">
                                        <img src="img/team/3.jpg" alt="M. Junaidi"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="info text-center">
                                        <h6>M. Junaidi</h6>
                                        <p>Founder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="item">
                                    <div class="img mb-2">
                                        <img src="img/team/4.jpg" alt="M. Pebrianto"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="info text-center">
                                        <h6>M. Pebrianto</h6>
                                        <p>CO Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.footer_client')
@endsection