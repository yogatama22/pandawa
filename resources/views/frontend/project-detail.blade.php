@extends('frontend.layouts.app')

@section('title', $project->title . ' - ' . ($company->company_name ?? config('app.name')))
@section('description', $project->short_description ?? Str::limit($project->description, 160))

@section('content')
    <div class="content-wrapper">
        <!-- Lines -->
        <section class="content-lines-wrapper">
            <div class="content-lines-inner">
                <div class="content-lines"></div>
            </div>
        </section>

        <!-- Header Banner -->
        <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-darkgray="5"
            data-background="{{ Storage::url($project->thumbnail) }}">
            <!-- Left Panel -->
            <div class="left-panel"></div>
        </section>

        <!-- Project Detail -->
        <section class="section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="section-title2">{{ $project->title }}</h2>
                                <!-- <span class="badge bg-primary">{{ $project->category }}</span>
                                @if($project->project_type)
                                    <span class="badge bg-secondary ms-2">{{ $project->project_type }}</span>
                                @endif -->
                            </div>
                            <a href="{{ route('projects') }}">
                                <i class="ti-arrow-left"></i> Back to Projects
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <!-- Description -->
                        @if($project->short_description)
                            <p class="lead">{{ $project->short_description }}</p>
                        @endif

                        <p>{{ $project->description }}</p>

                        <!-- Project Gallery -->
                        @if($project->images->count() > 0)
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <h4 class="mb-4">Project Gallery</h4>
                                </div>
                                @foreach($project->images as $image)
                                    <div class="col-md-6 gallery-item mb-4">
                                        <a href="{{ Storage::url($image->image_path) }}"
                                            title="{{ $image->caption ?? $project->title }}" class="img-zoom">
                                            <div class="gallery-box">
                                                <div class="gallery-img">
                                                    <img src="{{ Storage::url($image->image_path) }}"
                                                        class="img-fluid mx-auto d-block"
                                                        alt="{{ $image->caption ?? $project->title }}"
                                                        style="width: 100%; height: 300px; object-fit: cover;">
                                                </div>
                                                @if($image->caption)
                                                    <div class="mt-2">
                                                        <small class="text-muted">{{ $image->caption }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Project Info Sidebar -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body" style="background-color: #272727">
                                <h5 class="card-title mb-4">Project Information</h5>

                                @if($project->client_name)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Client:</b></p>
                                        <p class="text-muted">{{ $project->client_name }}</p>
                                    </div>
                                @endif

                                @if($project->location)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Location:</b></p>
                                        <p class="text-muted">{{ $project->location }}</p>
                                    </div>
                                @endif

                                @if($project->year)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Year:</b></p>
                                        <p class="text-muted">{{ $project->year }}</p>
                                    </div>
                                @endif

                                @if($project->area)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Area:</b></p>
                                        <p class="text-muted">{{ number_format($project->area, 2) }} m²</p>
                                    </div>
                                @endif

                                @if($project->duration)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Duration:</b></p>
                                        <p class="text-muted">{{ $project->duration }} days</p>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <p class="mb-1"><b>Category:</b></p>
                                    <p class="text-muted">{{ $project->category }}</p>
                                </div>

                                @if($project->project_type)
                                    <div class="mb-3">
                                        <p class="mb-1"><b>Project Type:</b></p>
                                        <p class="text-muted">{{ $project->project_type }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Contact CTA -->
                        @if($contact)
                            <div class="card border-0 shadow-sm mt-4"
                                style="background: #272727;">
                                <div class="card-body text-white">
                                    <h5 class="card-title text-white mb-3">Interested in This Project?</h5>
                                    <p class="mb-3">Contact us for more information or to discuss your project needs.</p>
                                    <a href="{{ route('contact') }}" class="btn btn-light w-100">
                                        <i class="ti-email me-2"></i>Contact Us
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Projects -->
        @if($relatedProjects->count() > 0)
            <section class="projects section-padding bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h3 class="section-title">Related <span>Projects</span></h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($relatedProjects as $related)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="item">
                                    <div class="position-re o-hidden">
                                        <a href="{{ route('projects.detail', $related->slug) }}">
                                            <img src="{{ Storage::url($related->thumbnail) }}" alt="{{ $related->title }}"
                                                style="width: 100%; height: 300px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="con">
                                        <h6>
                                            <a href="{{ route('projects', ['category' => $related->category]) }}">
                                                {{ $related->category }}
                                            </a>
                                        </h6>
                                        <h5>
                                            <a href="{{ route('projects.detail', $related->slug) }}">
                                                {{ $related->title }}
                                            </a>
                                        </h5>
                                        <div class="line"></div>
                                        <a href="{{ route('projects.detail', $related->slug) }}">
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Prev-Next Projects -->
        <section class="projects-prev-next">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div class="projects-prev-next-left">
                                @php
                                    $prevProject = \App\Models\Project::active()
                                        ->where('id', '<', $project->id)
                                        ->orderBy('id', 'desc')
                                        ->first();
                                @endphp
                                @if($prevProject)
                                    <a href="{{ route('projects.detail', $prevProject->slug) }}">
                                        <i class="ti-arrow-left"></i> Previous Project
                                    </a>
                                @endif
                            </div>

                            <a href="{{ route('projects') }}">
                                <i class="ti-layout-grid3-alt"></i>
                            </a>

                            <div class="projects-prev-next-right">
                                @php
                                    $nextProject = \App\Models\Project::active()
                                        ->where('id', '>', $project->id)
                                        ->orderBy('id', 'asc')
                                        ->first();
                                @endphp
                                @if($nextProject)
                                    <a href="{{ route('projects.detail', $nextProject->slug) }}">
                                        Next Project <i class="ti-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.partials.footer')
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
    <script>
        $(document).ready(function () {
            $('.img-zoom').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endpush