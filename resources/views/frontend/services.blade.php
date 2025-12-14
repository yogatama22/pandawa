@extends('frontend.layouts.app')

@section('title', 'Our Services - ' . ($company->company_name ?? config('app.name')))

@section('content')
    <!-- Lines -->
    <section class="content-lines-wrapper">
        <div class="content-lines-inner">
            <div class="content-lines"></div>
        </div>
    </section>

    <!-- Header Banner -->
    <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-darkgray="5"
        data-background="{{ asset('img/banner.jpg') }}">
        <!-- Left Panel -->
        <div class="left-panel"></div>
    </section>

    <!-- Services Section -->
    <section class="services section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Our <span>Services</span></h2>
                </div>
            </div>

            @if($services->count() > 0)
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="item">
                                <a href="#service-{{ $service->id }}" data-bs-toggle="modal">
                                    @if($service->image)
                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}">
                                    @elseif($service->icon)
                                        <img src="{{ asset('img/icons/' . $service->icon) }}" alt="{{ $service->title }}">
                                    @else
                                        <img src="{{ asset('img/icons/icon-' . (($service->order % 6) + 1) . '.png') }}"
                                            alt="{{ $service->title }}">
                                    @endif
                                    <h5>{{ $service->title }}</h5>
                                    <div class="line"></div>
                                    <p>{{ Str::limit($service->description, 120) }}</p>
                                    <div class="numb">{{ str_pad($service->order + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Service Details Accordion -->
                <!-- <div class="row mt-5">
                    <div class="col-md-12">
                        <h3 class="section-title2 mb-4">Service <span>Details</span></h3>
                        <div class="accordion" id="serviceAccordion">
                            @foreach($services as $index => $service)
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $service->id }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $service->id }}">
                                            <span
                                                class="badge bg-secondary me-3">{{ str_pad($service->order + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            <strong>{{ $service->title }}</strong>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $service->id }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        data-bs-parent="#serviceAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-3 mb-3 mb-md-0">
                                                    @if($service->image)
                                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}"
                                                            class="img-fluid rounded">
                                                    @elseif($service->icon)
                                                        <img src="{{ asset('img/icons/' . $service->icon) }}"
                                                            alt="{{ $service->title }}" class="img-fluid">
                                                    @endif
                                                </div>
                                                <div class="col-md-9">
                                                    <p>{{ $service->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> -->
            @else
                <!-- Empty State -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center py-5">
                            <i class="ti-briefcase" style="font-size: 4rem; color: #ccc;"></i>
                            <h4 class="mt-3">Belum Ada Service</h4>
                            <p class="text-muted">Service akan segera ditambahkan</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('frontend.partials.footer_client')
@endsection

@push('styles')
    <style>
        .accordion-button {
            background-color: #f8f9fa;
            color: #1b1b18;
            font-size: 1.1rem;
            padding: 1.25rem;
        }

        .accordion-button:not(.collapsed) {
            background-color: #1b1b18;
            color: white;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            padding: 1.5rem;
        }

        .accordion-item {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            overflow: hidden;
        }
    </style>
@endpush