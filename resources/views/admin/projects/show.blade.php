@extends('admin.layouts.app')

@section('title', 'Detail Project')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Detail Project</h2>
        <p class="text-muted mb-0">Informasi lengkap project</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Thumbnail -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-image me-2"></i>Thumbnail Project
            </div>
            <div class="card-body">
                @if($project->thumbnail)
                    <img src="{{ Storage::url($project->thumbnail) }}" 
                         alt="{{ $project->title }}" 
                         class="img-fluid rounded"
                         style="width: 100%; max-height: 400px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                         style="height: 400px;">
                        <div class="text-center">
                            <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                            <p class="text-muted mt-3">Tidak ada thumbnail</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Basic Info -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Informasi Project
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted mb-2">Judul</h5>
                    <h3>{{ $project->title }}</h3>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-muted mb-2">Kategori</h5>
                        <span class="badge bg-info fs-6">{{ $project->category }}</span>
                    </div>
                    @if($project->project_type)
                        <div class="col-md-6">
                            <h5 class="text-muted mb-2">Tipe Project</h5>
                            <span class="badge bg-secondary fs-6">{{ $project->project_type }}</span>
                        </div>
                    @endif
                </div>

                @if($project->short_description)
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Deskripsi Singkat</h5>
                        <p class="text-muted">{{ $project->short_description }}</p>
                    </div>
                @endif

                <div class="mb-4">
                    <h5 class="text-muted mb-2">Deskripsi Lengkap</h5>
                    <p class="text-muted">{{ $project->description }}</p>
                </div>
            </div>
        </div>

        <!-- Project Details -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-file-text me-2"></i>Detail Project
            </div>
            <div class="card-body">
                <div class="row">
                    @if($project->client_name)
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted mb-1">Client</h6>
                            <p class="mb-0"><strong>{{ $project->client_name }}</strong></p>
                        </div>
                    @endif

                    @if($project->location)
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted mb-1">Lokasi</h6>
                            <p class="mb-0">{{ $project->location }}</p>
                        </div>
                    @endif

                    @if($project->year)
                        <div class="col-md-4 mb-3">
                            <h6 class="text-muted mb-1">Tahun</h6>
                            <p class="mb-0">{{ $project->year }}</p>
                        </div>
                    @endif

                    @if($project->area)
                        <div class="col-md-4 mb-3">
                            <h6 class="text-muted mb-1">Luas Area</h6>
                            <p class="mb-0">{{ number_format($project->area, 2) }} m²</p>
                        </div>
                    @endif

                    @if($project->duration)
                        <div class="col-md-4 mb-3">
                            <h6 class="text-muted mb-1">Durasi</h6>
                            <p class="mb-0">{{ $project->duration }} hari</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-images me-2"></i>Galeri Gambar</span>
                <span class="badge bg-primary">{{ $project->images->count() }} Gambar</span>
            </div>
            <div class="card-body">
                @if($project->images->count() > 0)
                    <div class="row g-3">
                        @foreach($project->images as $image)
                            <div class="col-md-4">
                                <div class="position-relative">
                                    <img src="{{ Storage::url($image->image_path) }}" 
                                         alt="{{ $image->caption }}" 
                                         class="img-thumbnail"
                                         style="width: 100%; height: 200px; object-fit: cover;">
                                    @if($image->caption)
                                        <div class="mt-2">
                                            <small class="text-muted">{{ $image->caption }}</small>
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.projects.delete-image', $image) }}" 
                                          method="POST" 
                                          class="position-absolute top-0 end-0 m-2"
                                          onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-images text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-3">Belum ada gambar galeri</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-gear me-2"></i>Status & Pengaturan
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted mb-2">Order</h6>
                    <span class="badge bg-secondary fs-6">{{ $project->order }}</span>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted mb-2">Featured</h6>
                    <span class="badge {{ $project->is_featured ? 'bg-warning' : 'bg-secondary' }} fs-6">
                        <i class="bi {{ $project->is_featured ? 'bi-star-fill' : 'bi-star' }} me-1"></i>
                        {{ $project->is_featured ? 'Featured' : 'Not Featured' }}
                    </span>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted mb-2">Status Aktif</h6>
                    <span class="badge {{ $project->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                        <i class="bi {{ $project->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                        {{ $project->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-clock-history me-2"></i>Timeline
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Dibuat</small>
                    <strong>{{ $project->created_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $project->created_at->format('H:i') }} WIB</small>
                </div>
                
                <div>
                    <small class="text-muted d-block">Terakhir Diupdate</small>
                    <strong>{{ $project->updated_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $project->updated_at->format('H:i') }} WIB</small>
                    @if($project->updated_at->diffInDays($project->created_at) > 0)
                        <br>
                        <small class="text-info">
                            <i class="bi bi-info-circle me-1"></i>
                            {{ $project->updated_at->diffForHumans($project->created_at) }}
                        </small>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-lightning-charge me-2"></i>Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Project
                    </a>
                    
                    <form action="{{ route('admin.projects.toggle-featured', $project) }}" 
                          method="POST"
                          onsubmit="return confirm('Ubah status featured?')">
                        @csrf
                        <button type="submit" class="btn w-100 {{ $project->is_featured ? 'btn-secondary' : 'btn-warning' }}">
                            <i class="bi {{ $project->is_featured ? 'bi-star' : 'bi-star-fill' }} me-2"></i>
                            {{ $project->is_featured ? 'Remove Featured' : 'Set Featured' }}
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.projects.toggle', $project) }}" 
                          method="POST"
                          onsubmit="return confirm('Ubah status project?')">
                        @csrf
                        <button type="submit" class="btn w-100 {{ $project->is_active ? 'btn-secondary' : 'btn-success' }}">
                            <i class="bi {{ $project->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                            {{ $project->is_active ? 'Set Inactive' : 'Set Active' }}
                        </button>
                    </form>
                    
                    <hr>
                    
                    <form action="{{ route('admin.projects.destroy', $project) }}" 
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus project ini beserta semua gambarnya? Tindakan ini tidak dapat dibatalkan!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash me-2"></i>Hapus Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection