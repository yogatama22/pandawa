@extends('frontend.layouts.app')

@section('title', 'Our Projects - ' . ($company->company_name ?? config('app.name')))

@section('content')
    <!-- Lines -->
    <section class="content-lines-wrapper">
        <div class="content-lines-inner">
            <div class="content-lines"></div>
        </div>
    </section>

    <!-- Header Banner -->
    <section class="banner-header banner-img bg-img bg-fixed pb-0" data-background="{{ asset('img/banner.jpg') }}"
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

            <!-- Filter by Category -->
            @if($categories->count() > 0)
                <div class="row mb-4">
                    <div class="col-md-12">
                        <ul class="bauen-gallery-filter">
                            <li class="{{ !request('category') ? 'active' : '' }}">
                                <a href="{{ route('projects') }}" class="filter-link">All Projects</a>
                            </li>
                            @foreach($categories as $cat)
                                <li class="{{ request('category') == $cat ? 'active' : '' }}">
                                    <a href="{{ route('projects', ['category' => $cat]) }}" class="filter-link">{{ $cat }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Projects Grid -->
            @if($projects->count() > 0)
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-lg-6 col-md-12 mb-4 animate-box" data-animate-effect="fadeInUp">
                            <div class="item">
                                <div class="position-re o-hidden">
                                    <a href="{{ route('projects.detail', $project->slug) }}">
                                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}"
                                            style="width: 100%; height: 400px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="con">
                                    <h6>
                                        <a href="{{ route('projects', ['category' => $project->category]) }}">
                                            {{ $project->category }}
                                        </a>
                                    </h6>
                                    <h5>
                                        <a href="{{ route('projects.detail', $project->slug) }}">
                                            {{ $project->title }}
                                        </a>
                                    </h5>
                                    @if($project->short_description)
                                        <p class="text-muted">{{ Str::limit($project->short_description, 100) }}</p>
                                    @endif
                                    @if($project->client_name || $project->location)
                                        <div class="mb-2">
                                            @if($project->client_name)
                                                <small class="text-muted">
                                                    <i class="ti-briefcase"></i> {{ $project->client_name }}
                                                </small>
                                            @endif
                                            @if($project->location)
                                                <small class="text-muted ms-3">
                                                    <i class="ti-location-pin"></i> {{ $project->location }}
                                                </small>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="line"></div>
                                    <a href="{{ route('projects.detail', $project->slug) }}">
                                        <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center py-5">
                            <i class="ti-folder" style="font-size: 4rem; color: #ccc;"></i>
                            <h4 class="mt-3">Belum Ada Project</h4>
                            <p class="text-muted">
                                @if(request('category'))
                                    Tidak ada project dalam kategori "{{ request('category') }}"
                                @else
                                    Project akan segera ditambahkan
                                @endif
                            </p>
                            @if(request('category'))
                                <a href="{{ route('projects') }}" class="btn btn-primary mt-3">
                                    Lihat Semua Project
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    @include('frontend.partials.footer_client')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Override any existing click handlers on filter links
            const filterLinks = document.querySelectorAll('.bauen-gallery-filter a.filter-link');

            filterLinks.forEach(link => {
                // Remove all existing event listeners by cloning
                const newLink = link.cloneNode(true);
                link.parentNode.replaceChild(newLink, link);

                // Add new click handler
                newLink.addEventListener('click', function (e) {
                    // Don't prevent default - let the link work normally
                    const href = this.getAttribute('href');
                    if (href) {
                        window.location.href = href;
                    }
                });

                // Ensure proper styling
                newLink.style.cursor = 'pointer';
                newLink.style.pointerEvents = 'auto';
            });

            console.log('Filter links initialized:', filterLinks.length);
        });
    </script>

    <style>
        .bauen-gallery-filter li a {
            cursor: pointer !important;
            pointer-events: auto !important;
            display: block;
            text-decoration: none;
        }

        .bauen-gallery-filter li {
            cursor: pointer;
        }
    </style>
@endpush