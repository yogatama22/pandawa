@extends('admin.layouts.app')

@section('title', 'Detail Client')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Detail Client</h2>
            <p class="text-muted mb-0">Informasi lengkap client</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-image me-2"></i>Logo Client
                </div>
                <div class="card-body text-center">
                    @if($client->logo)
                        <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" class="img-fluid"
                            style="max-width: 300px; max-height: 300px; object-fit: contain;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded mx-auto"
                            style="width: 300px; height: 300px;">
                            <div class="text-center">
                                <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                                <p class="text-muted mt-3">Tidak ada logo</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="bi bi-file-text me-2"></i>Informasi Client
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Nama Client</h5>
                        <h3>{{ $client->name }}</h3>
                    </div>

                    @if($client->website)
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Website</h5>
                            <a href="{{ $client->website }}" target="_blank" class="text-decoration-none">
                                <i class="bi bi-globe me-2"></i>{{ $client->website }}
                                <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    @endif

                    @if($client->description)
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Deskripsi</h5>
                            <p class="text-muted">{{ $client->description }}</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-muted mb-2">Order</h5>
                            <span class="badge bg-secondary fs-6">{{ $client->order }}</span>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted mb-2">Status</h5>
                            <span class="badge {{ $client->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                                <i class="bi {{ $client->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                                {{ $client->is_active ? 'Active' : 'Inactive' }}
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
                        <strong>{{ $client->created_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $client->created_at->format('H:i') }} WIB</small>
                    </div>

                    <div>
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <strong>{{ $client->updated_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $client->updated_at->format('H:i') }} WIB</small>
                        @if($client->updated_at->diffInDays($client->created_at) > 0)
                            <br>
                            <small class="text-info">
                                <i class="bi bi-info-circle me-1"></i>
                                {{ $client->updated_at->diffForHumans($client->created_at) }}
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
                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit Client
                        </a>

                        <form action="{{ route('admin.clients.toggle', $client) }}" method="POST"
                            onsubmit="return confirm('Ubah status client?')">
                            @csrf
                            <button type="submit"
                                class="btn w-100 {{ $client->is_active ? 'btn-secondary' : 'btn-success' }}">
                                <i class="bi {{ $client->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                                {{ $client->is_active ? 'Set Inactive' : 'Set Active' }}
                            </button>
                        </form>

                        <hr>

                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus client ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash me-2"></i>Hapus Client
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection