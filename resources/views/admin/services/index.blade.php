@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Services Management</h2>
        <p class="text-muted mb-0">Kelola layanan perusahaan</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Service
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-briefcase me-2"></i>Daftar Services</span>
        <span class="badge bg-primary">{{ $services->count() }} Services</span>
    </div>
    <div class="card-body">
        @if($services->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Order</th>
                            <th style="width: 80px;">Icon/Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">{{ $service->order }}</span>
                                </td>
                                <td>
                                    @if($service->image)
                                        <img src="{{ Storage::url($service->image) }}" 
                                             alt="{{ $service->title }}" 
                                             class="img-thumbnail"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @elseif($service->icon)
                                        <img src="{{ asset('img/icons/' . $service->icon) }}" 
                                             alt="{{ $service->title }}"
                                             style="width: 40px; height: 40px;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-briefcase text-muted fs-4"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $service->title }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ Str::limit($service->description, 80) }}
                                    </small>
                                </td>
                                <td>
                                    <form action="{{ route('admin.services.toggle', $service) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm {{ $service->is_active ? 'btn-success' : 'btn-secondary' }}">
                                            @if($service->is_active)
                                                <i class="bi bi-check-circle me-1"></i>Active
                                            @else
                                                <i class="bi bi-x-circle me-1"></i>Inactive
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.services.show', $service) }}" 
                                           class="btn btn-sm btn-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service) }}" 
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus service ini?')">
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
                <i class="bi bi-briefcase text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Service</h5>
                <p class="text-muted">Klik tombol "Tambah Service" untuk membuat service baru</p>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Service Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection