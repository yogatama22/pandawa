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

            @if($team && $team->count() > 0)
                <div class="row align-items-stretch">
                    <!-- Left Side - Group Photo (static) -->
                    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 d-flex">
                        <div class="img w-100 h-100">
                            <img src="{{ asset('img/group_foto.png') }}"
                                alt="Team Group Photo"
                                class="w-100 h-100"
                                style="object-fit: cover;">
                        </div>
                    </div>

                    <!-- Right Side - Individual Members from Database -->
                    <div class="col-lg-6 col-md-12 d-flex flex-column">
                        @php
                            // Group team members by position category
                            $pandawaRenjana = $team->filter(function ($member) {
                                return in_array(strtolower($member->position), ['direktur', 'komisaris', 'director', 'commissioner']);
                            });

                            $renjanaAterier = $team->filter(function ($member) {
                                return in_array(strtolower($member->position), ['founder', 'co founder', 'co-founder']);
                            });

                            // Jika tidak ada yang cocok dengan filter, tampilkan semua dengan pembagian 50-50
                            if ($pandawaRenjana->isEmpty() && $renjanaAterier->isEmpty()) {
                                $half = ceil($team->count() / 2);
                                $pandawaRenjana = $team->take($half);
                                $renjanaAterier = $team->skip($half);
                            }
                        @endphp

                        <!-- Pandawa Renjana Section -->
                        @if($pandawaRenjana->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="section-title3">Pandawa <span>Renjana</span></h4>
                                <div class="row">
                                    @foreach($pandawaRenjana as $member)
                                        <div class="col-md-6 mb-3">
                                            <div class="item">
                                                <div class="img mb-2">
                                                    @if($member->photo)
                                                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                                                            style="width: 100%; height: 250px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('img/team/default.jpg') }}" alt="{{ $member->name }}"
                                                            style="width: 100%; height: 250px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                <div class="info text-center">
                                                    <h6>{{ $member->name }}</h6>
                                                    <p>{{ $member->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Renjana Aterier Section -->
                        @if($renjanaAterier->isNotEmpty())
                            <div>
                                <h4 class="section-title3">Renjana <span>Aterier</span></h4>
                                <div class="row">
                                    @foreach($renjanaAterier as $member)
                                        <div class="col-md-6 mb-3">
                                            <div class="item">
                                                <div class="img mb-2">
                                                    @if($member->photo)
                                                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                                                            style="width: 100%; height: 250px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('img/team/default.jpg') }}" alt="{{ $member->name }}"
                                                            style="width: 100%; height: 250px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                <div class="info text-center">
                                                    <h6>{{ $member->name }}</h6>
                                                    <p>{{ $member->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <!-- Fallback: Tampilan default jika belum ada data -->
                <div class="row align-items-stretch">
                    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 d-flex">
                        <div class="img w-100 h-100">
                            <img src="{{ asset('img/team/group-photo.jpg') }}"
                                alt="Team Group Photo"
                                class="w-100 h-100"
                                style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 d-flex flex-column">
                        <div class="text-center py-5 my-auto">
                            <i class="ti-user" style="font-size: 4rem; color: #ccc;"></i>
                            <h4 class="mt-3">Belum Ada Data Team</h4>
                            <p class="text-muted">Data team member akan segera ditambahkan</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('frontend.partials.footer_client')
@endsection
