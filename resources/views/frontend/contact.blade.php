@extends('frontend.layouts.app')

@section('title', 'Contact Us - ' . ($company->company_name ?? config('app.name')))

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
                    <p><b>{{ $company->company_name ?? 'Our Company' }}</b></p>
                    @if($contact)
                        @if($contact->address)
                            <p><b>Address:</b> {{ $contact->address }}</p>
                        @endif
                    @endif
                </div>
                
                <div class="col-lg-4 col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <p><b>Contact Details</b></p>
                    @if($contact)
                        @if($contact->phone)
                            <p><b>Phone:</b> <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
                        @endif
                        @if($contact->whatsapp)
                            <p><b>WhatsApp:</b> <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp) }}" target="_blank">{{ $contact->whatsapp }}</a></p>
                        @endif
                        @if($contact->email)
                            <p><b>Email:</b> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        @endif
                    @else
                        <p class="text-muted">Contact information will be available soon.</p>
                    @endif

                    <!-- Social Media -->
                    <!-- @if($contact && ($contact->facebook_url || $contact->instagram_url || $contact->twitter_url || $contact->tiktok_url || $contact->linkedin_url || $contact->youtube_url))
                        <div class="mt-3">
                            <p><b>Follow Us:</b></p>
                            <div class="social-icon">
                                @if($contact->facebook_url)
                                    <a href="{{ $contact->facebook_url }}" target="_blank"><i class="ti-facebook"></i></a>
                                @endif
                                @if($contact->instagram_url)
                                    <a href="{{ $contact->instagram_url }}" target="_blank"><i class="ti-instagram"></i></a>
                                @endif
                                @if($contact->twitter_url)
                                    <a href="{{ $contact->twitter_url }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                @endif
                                @if($contact->tiktok_url)
                                    <a href="{{ $contact->tiktok_url }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                @endif
                                @if($contact->linkedin_url)
                                    <a href="{{ $contact->linkedin_url }}" target="_blank"><i class="ti-linkedin"></i></a>
                                @endif
                                @if($contact->youtube_url)
                                    <a href="{{ $contact->youtube_url }}" target="_blank"><i class="ti-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    @endif -->
                </div>
                
                <div class="col-lg-4 col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <p><b>Contact Form</b></p>
                    <form method="post" action="{{ route('contact.submit') }}" class="contact__form">
                        @csrf
                        <!-- Form message -->
                        <div class="row">
                            <div class="col-12">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops!</strong> Ada beberapa kesalahan:
                                        <ul class="mb-0 mt-2">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Form elements -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input name="name" type="text" placeholder="Your Name *" 
                                       value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Your Email *" 
                                       value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" placeholder="Your Number" 
                                       value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <input name="subject" type="text" placeholder="Subject *" 
                                       value="{{ old('subject') }}" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" 
                                          placeholder="Message *" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <input name="submit" type="submit"  value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Map Section -->
            @if($contact && $contact->map_embed)
                <div class="row">
                    <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <div class="map-container">
                            {!! $contact->map_embed !!}
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
    .map-container {
        width: 100%;
        height: 500px;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
    
    .social-icon {
        display: flex;
        gap: 10px;
    }
    
    .social-icon a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #1b1b18;
        color: white;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .social-icon a:hover {
        background: #aa8453;
        transform: translateY(-3px);
    }
</style>
@endpush