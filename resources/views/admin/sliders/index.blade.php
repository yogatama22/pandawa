@extends('admin.layouts.app')

@section('title', 'Sliders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Sliders Management</h2>
        <p class="text-muted mb-0">Kelola slider untuk halaman utama website</p>
    </div>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Slider
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-images me-2"></i>Daftar Sliders</span>
        <span class="badge bg-primary">{{ $sliders->count() }} Sliders</span>
    </div>
    <div class="card-body">
        @if($sliders->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Order</th>
                            <th style="width: 100px;">Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width: 150px;">Button</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">{{ $slider->order }}</span>
                                </td>
                                <td>
                                    @if($slider->image)
                                        <img src="{{ Storage::url($slider->image) }}" 
                                             alt="{{ $slider->title }}" 
                                             class="img-thumbnail"
                                             style="width: 80px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 50px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $slider->title }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($slider->description, 50) }}
                                    </small>
                                </td>
                                <td>
                                    @if($slider->button_text)
                                        <span class="badge bg-info">{{ $slider->button_text }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.sliders.toggle', $slider) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm {{ $slider->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                onclick="return confirm('Ubah status slider?')">
                                            @if($slider->is_active)
                                                <i class="bi bi-check-circle me-1"></i>Active
                                            @else
                                                <i class="bi bi-x-circle me-1"></i>Inactive
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.sliders.show', $slider) }}" 
                                           class="btn btn-sm btn-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.sliders.edit', $slider) }}" 
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.sliders.destroy', $slider) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus slider ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Slider</h5>
                <p class="text-muted">Klik tombol "Tambah Slider" untuk membuat slider baru</p>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Slider Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection