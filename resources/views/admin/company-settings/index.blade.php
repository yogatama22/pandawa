@extends('admin.layouts.app')

@section('title', 'Company Settings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Company Settings</h2>
            <p class="text-muted mb-0">Kelola informasi perusahaan dan halaman about</p>
        </div>
        <a href="{{ route('admin.company-settings.edit') }}" class="btn btn-primary">
            <i class="bi bi-pencil me-2"></i>Edit Settings
        </a>
    </div>

    <!-- Company Profile Section -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-building me-2"></i>Company Profile</span>
            @if($company)
                <span class="badge bg-success">Configured</span>
            @else
                <span class="badge bg-warning">Not Set</span>
            @endif
        </div>
        <div class="card-body">
            @if($company)
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">Company Name</th>
                                    <td><strong>{{ $company->company_name }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Tagline</th>
                                    <td>{{ $company->tagline ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ Str::limit($company->description, 150) ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Title</th>
                                    <td>{{ $company->meta_title ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Description</th>
                                    <td>{{ Str::limit($company->meta_description, 100) ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Keywords</th>
                                    <td>{{ $company->meta_keywords ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6 class="text-muted mb-2">Logo</h6>
                            @if($company->logo)
                                <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 100px; object-fit: contain;">
                            @else
                                <div class="bg-light p-3 text-center rounded">
                                    <i class="bi bi-image text-muted fs-1"></i>
                                    <p class="text-muted small mb-0 mt-2">No logo uploaded</p>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h6 class="text-muted mb-2">Favicon</h6>
                            @if($company->favicon)
                                <img src="{{ Storage::url($company->favicon) }}" alt="Favicon" class="img-thumbnail"
                                    style="width: 50px; height: 50px; object-fit: contain;">
                            @else
                                <div class="bg-light p-3 text-center rounded" style="width: 50px; height: 50px;">
                                    <i class="bi bi-question-circle text-muted fs-4"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="bi bi-building text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3 mb-0">Company profile belum diatur</p>
                </div>
            @endif
        </div>
    </div>

    <!-- About Section -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-info-circle me-2"></i>About Information</span>
            @if($about)
                <span class="badge bg-success">Configured</span>
            @else
                <span class="badge bg-warning">Not Set</span>
            @endif
        </div>
        <div class="card-body">
            @if($about)
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Title</h5>
                            <h4>{{ $about->title }}</h4>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Description</h5>
                            <p class="text-muted">{{ Str::limit($about->description, 300) }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5 class="text-muted mb-2">Mission</h5>
                                <p class="text-muted">{{ $about->mission ? Str::limit($about->mission, 150) : '-' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="text-muted mb-2">Vision</h5>
                                <p class="text-muted">{{ $about->vision ? Str::limit($about->vision, 150) : '-' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-muted mb-2">Image</h6>
                        @if($about->image)
                            <img src="{{ Storage::url($about->image) }}" alt="About Image" class="img-thumbnail"
                                style="width: 100%; max-height: 300px; object-fit: cover;">
                        @else
                            <div class="bg-light p-4 text-center rounded">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted small mb-0 mt-2">No image uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="bi bi-info-circle text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3 mb-0">About information belum diatur</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mt-4 border-primary">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="bi bi-lightbulb text-primary fs-3 me-3"></i>
                <div class="flex-grow-1">
                    <h6 class="mb-1">Perlu mengubah informasi perusahaan?</h6>
                    <p class="text-muted small mb-0">Klik tombol Edit Settings untuk memperbarui Company Profile dan About
                        Information</p>
                </div>
                <a href="{{ route('admin.company-settings.edit') }}" class="btn btn-primary">
                    <i class="bi bi-pencil me-2"></i>Edit Settings
                </a>
            </div>
        </div>
    </div>
@endsection