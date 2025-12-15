<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic SEO Meta Tags from Company Settings --}}
    <title>{{ $company->meta_title ?? $company->company_name ?? config('app.name') }}</title>
    <meta name="description" content="{{ $company->meta_description ?? $company->description ?? '' }}">
    <meta name="keywords" content="{{ $company->meta_keywords ?? '' }}">
    <meta name="author" content="{{ $company->company_name ?? '' }}">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="{{ $company->meta_title ?? $company->company_name ?? '' }}">
    <meta property="og:description" content="{{ $company->meta_description ?? '' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($company && $company->logo)
        <meta property="og:image" content="{{ asset('storage/' . $company->logo) }}">
    @endif

    {{-- Favicon from Company Settings --}}
    @if($company && $company->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $company->favicon) }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . $company->favicon) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif


    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&amp;family=Oswald:wght@200..700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        .clients-logo {
            width: 90px;
            height: 90px;
            overflow: hidden;
        }

        .clients-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"><span></span></div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    @include('frontend.partials.navbar')

    @yield('content')


    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.v3.0.2.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('js/before-after.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>