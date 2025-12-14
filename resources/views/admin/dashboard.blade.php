@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Dashboard</h2>
            <p class="text-muted mb-0">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>
        <div>
            <span class="text-muted">
                <i class="bi bi-calendar-event me-2"></i>{{ now()->format('l, d F Y') }}
            </span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card border-start-primary" style="border-left-color: #3b82f6 !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase" style="font-size: 0.875rem;">Sliders</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['sliders'] }}</h2>
                        </div>
                        <div class="text-primary" style="font-size: 2.5rem;">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card border-start-success" style="border-left-color: #10b981 !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase" style="font-size: 0.875rem;">Services</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['services'] }}</h2>
                        </div>
                        <div class="text-success" style="font-size: 2.5rem;">
                            <i class="bi bi-briefcase"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-success">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card border-start-warning" style="border-left-color: #f59e0b !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase" style="font-size: 0.875rem;">Team Members</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['team_members'] }}</h2>
                        </div>
                        <div class="text-warning" style="font-size: 2.5rem;">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.team-members.index') }}" class="btn btn-sm btn-outline-warning">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card border-start-info" style="border-left-color: #06b6d4 !important;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase" style="font-size: 0.875rem;">Testimonials</h6>
                            <h2 class="mb-0 fw-bold">{{ $stats['testimonials'] }}</h2>
                        </div>
                        <div class="text-info" style="font-size: 2.5rem;">
                            <i class="bi bi-chat-quote"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-info">
                            Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <!-- Quick Actions - Updated Section -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lightning-charge me-2"></i>Quick Actions
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-primary text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Slider Baru
                        </a>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-outline-success text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Service Baru
                        </a>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-info text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Project Baru
                        </a>
                        <a href="{{ route('admin.team-members.create') }}" class="btn btn-outline-warning text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Team Member
                        </a>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-outline-secondary text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Testimonial
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-gear me-2"></i>Website Settings
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.company-settings.index') }}" class="btn btn-outline-primary text-start">
                            <i class="bi bi-gear-fill me-2"></i>Company Settings
                            <small class="text-muted d-block ms-4">Profile, About, SEO</small>
                        </a>
                        <a href="{{ route('admin.contact-info.index') }}" class="btn btn-outline-secondary text-start">
                            <i class="bi bi-envelope me-2"></i>Contact Information
                            <small class="text-muted d-block ms-4">Address, Phone, Social Media</small>
                        </a>
                        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary text-start">
                            <i class="bi bi-inbox me-2"></i>Contact Messages
                            <small class="text-muted d-block ms-4">Manage incoming messages</small>
                        </a>
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-outline-secondary text-start">
                            <i class="bi bi-list-ul me-2"></i>Menu Management
                            <small class="text-muted d-block ms-4">Navigation & Structure</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection