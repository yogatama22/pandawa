@extends('frontend.layouts.app')

@section('content')
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            @forelse($sliders as $slider)
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="text-end item bg-img" data-overlay-darkgray="7"
                    data-background="{{ $slider->image ? Storage::url($slider->image) : asset('img/slider/1.jpg') }}">
                    <div class="v-middle caption mt-30">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 col-md-12 text-end">
                                    <h1>{{ $slider->title }}</h1>
                                    @if($slider->description)
                                        <p>{!! nl2br(e($slider->description)) !!}</p>
                                    @endif
                                    @if($slider->button_text && $slider->button_link)
                                        <div class="butn-light mt-30 mb-30">
                                            <a href="{{ $slider->button_link }}" {{ Str::startsWith($slider->button_link, 'http') ? 'target="_blank"' : '' }}>
                                                <span>{{ $slider->button_text }}</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Default slider jika belum ada data -->
                <div class="text-end item bg-img" data-overlay-darkgray="7" data-background="{{ asset('img/slider/1.jpg') }}">
                    <div class="v-middle caption mt-30">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 col-md-12 text-end">
                                    <h1>Welcome to Our Website</h1>
                                    <p>Architecture viverra tellus nec massa dictum the euismoe.
                                        <br>Curabitur viverra the posuere aukue velit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <!-- Corner -->
        <div class="hero-corner"></div>
        <div class="hero-corner3"></div>
        <!-- Left Panel -->
        <div class="left-panel">
            <ul class="social-left clearfix">
                <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
            </ul>
        </div>
    </header>

    <!-- Content -->
    <div class="content-wrapper">
        <!-- Lines -->
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>

        <!-- About -->
        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">About <span>{{ $company->company_name ?? 'Bauen' }}</span></h2>
                        @if($about)
                            <p>{{ $about->description }}</p>
                            @if($about->mission)
                                <p><strong>Mission:</strong> {{ $about->mission }}</p>
                            @endif
                            @if($about->vision)
                                <p><strong>Vision:</strong> {{ $about->vision }}</p>
                            @endif
                        @else
                            <p>Architecture viverra tristique justo duis vitae diam neque nivamus aestan ateuene artines
                                aringianu atelit finibus viverra nec lacus. Nedana theme erodino setlie suscipe no curabit
                                tristique.</p>
                            <p>Design inilla duiman at elit finibus viverra nec a lacus themo the drudea seneoice misuscipit non
                                sagie the fermen.</p>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 animate-box" data-animate-effect="fadeInUp">
                        <div class="about-img">
                            <div class="img">
                                <img src="{{ $about && $about->image ? Storage::url($about->image) : asset('img/about.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="about-img-2 about-buro">{{ $company->company_name ?? 'Our' }} Office</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects -->
        <section class="projects section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">Our <span>Projects</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            @forelse($featuredProjects as $project)
                                <div class="item">
                                    <div class="position-re o-hidden">
                                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}">
                                    </div>
                                    <div class="con">
                                        <h6><a
                                                href="{{ route('projects.detail', $project->slug) }}">{{ $project->category }}</a>
                                        </h6>
                                        <h5><a href="{{ route('projects.detail', $project->slug) }}">{{ $project->title }}</a>
                                        </h5>
                                        <div class="line"></div>
                                        <a href="{{ route('projects.detail', $project->slug) }}"><i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @empty
                                <!-- Default projects jika belum ada data -->
                                <div class="item">
                                    <div class="position-re o-hidden"> <img src="{{ asset('img/projects/1.jpg') }}" alt="">
                                    </div>
                                    <div class="con">
                                        <h6><a href="#">Interior</a></h6>
                                        <h5><a href="#">Sample Project</a></h5>
                                        <div class="line"></div> <a href="#"><i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="services section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">Our <span>Services</span></h2>
                    </div>
                </div>
                <div class="row">
                    @forelse($services as $index => $service)
                        <div class="col-md-4">
                            <div class="item">
                                <a href="#">
                                    @if($service->image)
                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}">
                                    @elseif($service->icon)
                                        <img src="{{ asset('img/icons/' . $service->icon) }}" alt="{{ $service->title }}">
                                    @else
                                        <img src="{{ asset('img/icons/icon-' . ($index + 1) . '.png') }}"
                                            alt="{{ $service->title }}">
                                    @endif
                                    <h5>{{ $service->title }}</h5>
                                    <div class="line"></div>
                                    <p>{{ Str::limit($service->description, 120) }}</p>
                                    <div class="numb">{{ str_pad($service->order, 2, '0', STR_PAD_LEFT) }}</div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-4">
                            <div class="item">
                                <a href="#"> <img src="{{ asset('img/icons/icon-1.png') }}" alt="">
                                    <h5>Architecture</h5>
                                    <div class="line"></div>
                                    <p>Architecture bibendum eros eget lacus the vulputate sit amet vehicuta nibhen ulicera in
                                        the vitae miss.</p>
                                    <div class="numb">01</div>
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section class="bauen-blog section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">Current <span>News</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="position-re o-hidden"> <img src="{{ asset('img/slider/1.jpg') }}" alt=""> </div>
                                <div class="con"> <span class="category">
                                        <a href="blog.html">Architecture </a> - 20.12.2025
                                    </span>
                                    <h5><a href="post.html">Modern Architectural Structures</a></h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="position-re o-hidden"> <img src="{{ asset('img/slider/2.jpg') }}" alt=""> </div>
                                <div class="con"> <span class="category">
                                        <a href="blog.html">Interior</a> - 18.12.2025
                                    </span>
                                    <h5><a href="post.html">Modernism in Architecture</a></h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="position-re o-hidden"> <img src="{{ asset('img/slider/3.jpg') }}" alt=""> </div>
                                <div class="con"> <span class="category">
                                        <a href="blog.html">Urban</a> - 16.12.2025
                                    </span>
                                    <h5><a href="post.html">Postmodern Architecture</a></h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="position-re o-hidden"> <img src="{{ asset('img/slider/4.jpg') }}" alt=""> </div>
                                <div class="con"> <span class="category">
                                        <a href="blog.html">Planing</a> - 14.12.2025
                                    </span>
                                    <h5><a href="post.html">Modern Architecture Buildings</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.partials.footer')
    </div>
@endsection