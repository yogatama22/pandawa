@extends('admin.layouts.app')

@section('title', 'Detail Slider')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Detail Slider</h2>
        <p class="text-muted mb-0">Informasi lengkap slider</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit
        </a>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-image me-2"></i>Gambar Slider
            </div>
            <div class="card-body">
                @if($slider->image)
                    <img src="{{ Storage::url($slider->image) }}" 
                         alt="{{ $slider->title }}" 
                         class="img-fluid rounded"
                         style="width: 100%; max-height: 400px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                         style="height: 400px;">
                        <div class="text-center">
                            <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                            <p class="text-muted mt-3">Tidak ada gambar</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-text me-2"></i>Informasi Konten
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted mb-2">Title</h5>
                    <h3>{{ $slider->title }}</h3>
                </div>

                @if($slider->description)
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Description</h5>
                        <p class="text-muted">{{ $slider->description }}</p>
                    </div>
                @endif

                @if($slider->button_text || $slider->button_link)
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Button Action</h5>
                        <div class="d-flex gap-3">
                            @if($slider->button_text)
                                <div>
                                    <small class="text-muted d-block">Button Text</small>
                                    <span class="badge bg-primary">{{ $slider->button_text }}</span>
                                </div>
                            @endif
                            
                            @if($slider->button_link)
                                <div>
                                    <small class="text-muted d-block">Button Link</small>
                                    <a href="{{ $slider->button_link }}" 
                                       target="_blank" 
                                       class="text-decoration-none">
                                        {{ Str::limit($slider->button_link, 50) }}
                                        <i class="bi bi-box-arrow-up-right ms-1"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-muted mb-2">Order</h5>
                        <span class="badge bg-secondary fs-6">{{ $slider->order }}</span>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-muted mb-2">Status</h5>
                        <span class="badge {{ $slider->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            <i class="bi {{ $slider->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                            {{ $slider->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-clock-history me-2"></i>Timeline
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Dibuat</small>
                    <strong>{{ $slider->created_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $slider->created_at->format('H:i') }} WIB</small>
                </div>
                
                <div>
                    <small class="text-muted d-block">Terakhir Diupdate</small>
                    <strong>{{ $slider->updated_at->format('d F Y') }}</strong>
                    <br>
                    <small class="text-muted">{{ $slider->updated_at->format('H:i') }} WIB</small>
                    @if($slider->updated_at->diffInDays($slider->created_at) > 0)
                        <br>
                        <small class="text-info">
                            <i class="bi bi-info-circle me-1"></i>
                            {{ $slider->updated_at->diffForHumans($slider->created_at) }}
                        </small>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-gear me-2"></i>Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Slider
                    </a>
                    
                    <form action="{{ route('admin.sliders.toggle', $slider) }}" 
                          method="POST"
                          onsubmit="return confirm('Ubah status slider?')">
                        @csrf
                        <button type="submit" class="btn w-100 {{ $slider->is_active ? 'btn-secondary' : 'btn-success' }}">
                            <i class="bi {{ $slider->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                            {{ $slider->is_active ? 'Set Inactive' : 'Set Active' }}
                        </button>
                    </form>
                    
                    <hr>
                    
                    <form action="{{ route('admin.sliders.destroy', $slider) }}" 
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus slider ini? Tindakan ini tidak dapat dibatalkan!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash me-2"></i>Hapus Slider
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($slider->image)
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Info Gambar
                </div>
                <div class="card-body">
                    <small class="text-muted d-block mb-1">Path:</small>
                    <code class="small">{{ $slider->image }}</code>
                    
                    <hr>
                    
                    <a href="{{ Storage::url($slider->image) }}" 
                       target="_blank" 
                       class="btn btn-sm btn-outline-primary w-100">
                        <i class="bi bi-download me-2"></i>Download Gambar
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection