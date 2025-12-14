{{-- resources/views/admin/team-members/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Team Members Management</h2>
            <p class="text-muted mb-0">Kelola anggota tim perusahaan</p>
        </div>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Team Member
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-people me-2"></i>Daftar Team Members</span>
            <span class="badge bg-primary">{{ $teamMembers->count() }} Members</span>
        </div>
        <div class="card-body">
            @if($teamMembers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">Order</th>
                                <th style="width: 80px;">Photo</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Contact</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamMembers as $member)
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary">{{ $member->order }}</span>
                                    </td>
                                    <td>
                                        @if($member->photo)
                                            <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                                                class="img-thumbnail"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                                <i class="bi bi-person text-muted fs-4"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $member->name }}</strong>
                                        @if($member->bio)
                                            <br>
                                            <small class="text-muted">{{ Str::limit($member->bio, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $member->position }}</span>
                                    </td>
                                    <td>
                                        @if($member->email)
                                            <small class="d-block"><i class="bi bi-envelope me-1"></i>{{ $member->email }}</small>
                                        @endif
                                        @if($member->phone)
                                            <small class="d-block"><i class="bi bi-telephone me-1"></i>{{ $member->phone }}</small>
                                        @endif
                                        @if(!$member->email && !$member->phone)
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.team-members.toggle', $member) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm {{ $member->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($member->is_active)
                                                    <i class="bi bi-check-circle me-1"></i>Active
                                                @else
                                                    <i class="bi bi-x-circle me-1"></i>Inactive
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.team-members.show', $member) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus team member ini?')">
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
                    <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Team Member</h5>
                    <p class="text-muted">Klik tombol "Tambah Team Member" untuk menambahkan anggota tim</p>
                    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Team Member Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection