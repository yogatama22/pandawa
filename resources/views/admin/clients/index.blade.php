@extends('admin.layouts.app')

@section('title', 'Clients')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Clients Management</h2>
            <p class="text-muted mb-0">Kelola client/partner perusahaan</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Client
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-briefcase me-2"></i>Daftar Clients</span>
            <span class="badge bg-primary">{{ $clients->count() }} Clients</span>
        </div>
        <div class="card-body">
            @if($clients->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">Order</th>
                                <th style="width: 100px;">Logo</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary">{{ $client->order }}</span>
                                    </td>
                                    <td>
                                        @if($client->logo)
                                            <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" class="img-thumbnail"
                                                style="width: 80px; height: 50px; object-fit: contain;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                style="width: 80px; height: 50px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $client->name }}</strong>
                                        @if($client->description)
                                            <br>
                                            <small class="text-muted">{{ Str::limit($client->description, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($client->website)
                                            <a href="{{ $client->website }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-globe me-1"></i>
                                                {{ Str::limit($client->website, 30) }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.clients.toggle', $client) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm {{ $client->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($client->is_active)
                                                    <i class="bi bi-check-circle me-1"></i>Active
                                                @else
                                                    <i class="bi bi-x-circle me-1"></i>Inactive
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.clients.show', $client) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus client ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
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
                    <h5 class="mt-3 text-muted">Belum Ada Client</h5>
                    <p class="text-muted">Klik tombol "Tambah Client" untuk menambahkan client baru</p>
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Client Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection