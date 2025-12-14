@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Contact Messages</h2>
        <p class="text-muted mb-0">Kelola pesan dari pengunjung website</p>
    </div>
    @if($unreadCount > 0)
        <span class="badge bg-warning fs-5">
            <i class="bi bi-envelope me-1"></i>{{ $unreadCount }} Pesan Belum Dibaca
        </span>
    @endif
</div>

<!-- Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.contact-messages.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Filter Status</label>
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                    <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Sudah Dibalas</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-envelope me-2"></i>Daftar Pesan</span>
        <span class="badge bg-primary">{{ $messages->total() }} Total Pesan</span>
    </div>
    <div class="card-body">
        @if($messages->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Status</th>
                            <th>Pengirim</th>
                            <th>Kontak</th>
                            <th>Subject</th>
                            <th>Tanggal</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr class="{{ $message->status === 'unread' ? 'table-warning' : '' }}">
                                <td>
                                    <span class="badge {{ $message->status_badge }}">
                                        {{ $message->status_label }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ $message->name }}</strong>
                                    @if($message->status === 'unread')
                                        <i class="bi bi-circle-fill text-warning ms-1" style="font-size: 0.5rem;"></i>
                                    @endif
                                </td>
                                <td>
                                    <small>
                                        <i class="bi bi-envelope me-1"></i>{{ $message->email }}<br>
                                        @if($message->phone)
                                            <i class="bi bi-telephone me-1"></i>{{ $message->phone }}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <strong>{{ $message->subject }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($message->message, 50) }}</small>
                                </td>
                                <td>
                                    <small>
                                        {{ $message->created_at->format('d M Y') }}<br>
                                        {{ $message->created_at->format('H:i') }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.contact-messages.show', $message) }}" 
                                           class="btn btn-sm btn-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.contact-messages.destroy', $message) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
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

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $messages->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-envelope text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Pesan</h5>
                <p class="text-muted">Pesan dari pengunjung akan muncul di sini</p>
            </div>
        @endif
    </div>
</div>
@endsection