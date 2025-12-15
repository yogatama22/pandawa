<nav class="navbar navbar-expand-lg">
    <!-- Logo -->
    <div class="logo-wrapper valign">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="img/logo_sec.png" class="logo-img" alt="">
            </a>
        </div>
    </div>

    <!-- Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                    Services
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}"
                    href="{{ route('projects') }}">
                    Projects
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
        </ul>
    </div>
</nav>