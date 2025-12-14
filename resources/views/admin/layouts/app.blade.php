<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --sidebar-bg: #1e3a8a;
            --sidebar-hover: #2563eb;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fc;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #1e40af 100%);
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: all 0.3s ease;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-brand {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 1rem;
            background-color: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand h4 {
            color: white;
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .menu-item {
            margin: 0.25rem 0.75rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .menu-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .menu-link i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .menu-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 1rem 1.5rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Topbar */
        .topbar {
            background-color: white;
            height: 70px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            position: sticky;
            top: 0;
            z-index: 1001;
        }

        .topbar-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
        }

        .page-title h1 {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e3a8a;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .dropdown-toggle::after {
            display: none;
        }

        /* Content Area */
        .content-area {
            padding: 1.5rem;
        }

        /* Cards */
        .stat-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.25);
        }

        .stat-card .card-body {
            padding: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        /* Buttons */
        .btn {
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.5rem 1.25rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Tables */
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table thead th {
            background-color: #f8f9fc;
            border-bottom: 2px solid #e3e6f0;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            color: #5a5c69;
        }

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
            border: none;
        }

        /* Badges */
        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 0.35rem;
            font-weight: 500;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: calc(var(--sidebar-width) * -1);
                /* Tersembunyi di kiri */
            }

            .sidebar.show {
                margin-left: 0;
                /* Muncul */
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block !important;
            }
        }

        .mobile-toggle {
            display: none;
            padding: 0.5rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #1e3a8a;
            cursor: pointer;
            position: relative;
            z-index: 1002;
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="../img/logo_sec.png" width="80%" class="logo-img" alt="">
        </div>

        <div class="sidebar-menu">
            <div class="menu-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.company-settings.index') }}"
                    class="menu-link {{ request()->routeIs('admin.company-settings.*') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill"></i>
                    <span>Company Settings</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.sliders.index') }}"
                    class="menu-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    <span>Sliders</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.menus.index') }}"
                    class="menu-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                    <i class="bi bi-list-ul"></i>
                    <span>Menus</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.services.index') }}"
                    class="menu-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Services</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.projects.index') }}"
                    class="menu-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="bi bi-folder"></i>
                    <span>Projects</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.team-members.index') }}"
                    class="menu-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Team Members</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.testimonials.index') }}"
                    class="menu-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote"></i>
                    <span>Testimonials</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.contact-info.index') }}"
                    class="menu-link {{ request()->routeIs('admin.contact-info.*') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact Info</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.contact-messages.index') }}"
                    class="menu-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                    <i class="bi bi-inbox"></i>
                    <span>Contact Messages</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('admin.master-images.index') }}"
                    class="menu-link {{ request()->routeIs('admin.master-images.*') ? 'active' : '' }}">
                    <i class="bi bi-card-image"></i>
                    <span>Master Images</span>
                </a>
            </div>

            <div class="menu-divider"></div>

            <div class="menu-item">
                <a href="{{ route('home') }}" class="menu-link" target="_blank">
                    <i class="bi bi-globe"></i>
                    <span>View Website</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-container">
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary mobile-toggle" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <!-- <div class="page-title">
                        <h1>@yield('page-title', 'Dashboard')</h1>
                    </div> -->
                </div>

                <div class="user-info">
                    <span class="d-none d-md-inline text-muted me-2">
                        <small>{{ now()->format('l, d F Y') }}</small>
                    </span>
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <div class="user-avatar me-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="d-none d-md-inline fw-semibold">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i>Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-gear me-2"></i>Settings
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar Toggle for Mobile
        document.querySelector('.mobile-toggle')?.addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (e) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');

            if (window.innerWidth <= 768 && sidebar.classList.contains('show')) {
                if (!sidebar.contains(e.target) && e.target !== toggle) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>

    @stack('scripts')
</body>

</html>