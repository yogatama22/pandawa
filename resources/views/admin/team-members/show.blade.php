@extends('admin.layouts.app')

@section('title', 'Detail Slider')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Detail Team Member</h2>
            <p class="text-muted mb-0">Informasi lengkap team member</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.team-members.edit', $teamMember) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-person me-2"></i>Photo
                </div>
                <div class="card-body text-center">
                    @if($teamMember->photo)
                        <img src="{{ Storage::url($teamMember->photo) }}" alt="{{ $teamMember->name }}"
                            class="img-fluid rounded" style="max-width: 300px; max-height: 300px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded mx-auto"
                            style="width: 300px; height: 300px;">
                            <div class="text-center">
                                <i class="bi bi-person text-muted" style="font-size: 5rem;"></i>
                                <p class="text-muted mt-3">Tidak ada photo</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="bi bi-file-text me-2"></i>Informasi Team Member
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Name</h5>
                        <h3>{{ $teamMember->name }}</h3>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Position</h5>
                        <span class="badge bg-info fs-6">{{ $teamMember->position }}</span>
                    </div>

                    @if($teamMember->bio)
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Bio</h5>
                            <p class="text-muted">{{ $teamMember->bio }}</p>
                        </div>
                    @endif

                    @if($teamMember->email || $teamMember->phone)
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Contact Information</h5>
                            @if($teamMember->email)
                                <p class="mb-1">
                                    <i class="bi bi-envelope me-2"></i>
                                    <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a>
                                </p>
                            @endif
                            @if($teamMember->phone)
                                <p class="mb-1">
                                    <i class="bi bi-telephone me-2"></i>
                                    <a href="tel:{{ $teamMember->phone }}">{{ $teamMember->phone }}</a>
                                </p>
                            @endif
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-muted mb-2">Order</h5>
                            <span class="badge bg-secondary fs-6">{{ $teamMember->order }}</span>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted mb-2">Status</h5>
                            <span class="badge {{ $teamMember->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                                <i class="bi {{ $teamMember->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                                {{ $teamMember->is_active ? 'Active' : 'Inactive' }}
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
                        <strong>{{ $teamMember->created_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $teamMember->created_at->format('H:i') }} WIB</small>
                    </div>

                    <div>
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <strong>{{ $teamMember->updated_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $teamMember->updated_at->format('H:i') }} WIB</small>
                        @if($teamMember->updated_at->diffInDays($teamMember->created_at) > 0)
                            <br>
                            <small class="text-info">
                                <i class="bi bi-info-circle me-1"></i>
                                {{ $teamMember->updated_at->diffForHumans($teamMember->created_at) }}
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
                        <a href="{{ route('admin.team-members.edit', $teamMember) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit Team Member
                        </a>

                        <form action="{{ route('admin.team-members.toggle', $teamMember) }}" method="POST"
                            onsubmit="return confirm('Ubah status team member?')">
                            @csrf
                            <button type="submit"
                                class="btn w-100 {{ $teamMember->is_active ? 'btn-secondary' : 'btn-success' }}">
                                <i class="bi {{ $teamMember->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                                {{ $teamMember->is_active ? 'Set Inactive' : 'Set Active' }}
                            </button>
                        </form>

                        <hr>

                        <form action="{{ route('admin.team-members.destroy', $teamMember) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus team member ini? Tindakan ini tidak dapat dibatalkan!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash me-2"></i>Hapus Team Member
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection