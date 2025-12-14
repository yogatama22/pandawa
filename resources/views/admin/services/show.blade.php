@extends('admin.layouts.app')

@section('title', 'Detail Service')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Detail Service</h2>
        <p class="text-muted mb-0">Informasi lengkap service</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Icon/Image -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-image me-2"></i>Icon/Image
            </div>
            <div class="card-body text-center">
                @if($service->image)
                    <img src="{{ Storage::url($service->image) }}" 
                         alt="{{ $service->title }}"
                         class="img-fluid rounded" 
                         style="max-width: 300px; max-height: 300px; object-fit: cover;">
                @elseif($service->icon)
                    <img src="{{ asset('img/icons/' . $service->icon) }}" 
                         alt="{{ $service->title }}"
                         style="max-width: 200px; max-height: 200px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mx-auto"
                         style="width: 200px; height: 200px;">
                        <div class="text-center">
                            <i class="bi bi-briefcase text-muted" style="font-size: 5rem;"></i>
                            <p class="text-muted mt-3">Tidak ada icon/image</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Service Info -->
        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-text me-2"></i>Informasi Service
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted mb-2">Title</h5>
                    <h3>{{ $service->title }}</h3>
                </div>

                <div class="mb-4">
                    <h5 class="text-muted mb-2">Description</h5>
                    <p class="text-muted">{{ $service->description }}</p>
                </div>

                @if($service->icon)
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Icon</h5>
                        <code>{{ $service->icon }}</code>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-muted mb-2">Order</h5>
                        <span class="badge bg-secondary fs-6">{{ $service->order }}</span>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted mb-2">Status</h5>
                        <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            <i class="bi {{ $service->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Timeline -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-clock-history me-2"></i>Timeline
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Dibuat</small>
                    <strong>{{ $service->created_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $service->created_at->format('H:i') }} WIB</small>
                </div>
                
                <div>
                    <small class="text-muted d-block">Terakhir Diupdate</small>
                    <strong>{{ $service->updated_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $service->updated_at->format('H:i') }} WIB</small>
                    @if($service->updated_at->diffInDays($service->created_at) > 0)
                        <br>
                        <small class="text-info">
                            <i class="bi bi-info-circle me-1"></i>
                            {{ $service->updated_at->diffForHumans($service->created_at) }}
                        </small>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-gear me-2"></i>Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Service
                    </a>
                    
                    <form action="{{ route('admin.services.toggle', $service) }}" 
                          method="POST"
                          onsubmit="return confirm('Ubah status service?')">
                        @csrf
                        <button type="submit" class="btn w-100 {{ $service->is_active ? 'btn-secondary' : 'btn-success' }}">
                            <i class="bi {{ $service->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                            {{ $service->is_active ? 'Set Inactive' : 'Set Active' }}
                        </button>
                    </form>
                    
                    <hr>
                    
                    <form action="{{ route('admin.services.destroy', $service) }}" 
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus service ini? Tindakan ini tidak dapat dibatalkan!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash me-2"></i>Hapus Service
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection