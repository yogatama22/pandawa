@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Detail Pesan</h2>
        <p class="text-muted mb-0">Pesan dari {{ $contactMessage->name }}</p>
    </div>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Message Content -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-envelope-open me-2"></i>Isi Pesan</span>
                <span class="badge {{ $contactMessage->status_badge }}">
                    {{ $contactMessage->status_label }}
                </span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-muted mb-2">Subject</h5>
                    <h4>{{ $contactMessage->subject }}</h4>
                </div>

                <div class="mb-4">
                    <h5 class="text-muted mb-2">Pesan</h5>
                    <p class="text-muted" style="white-space: pre-line;">{{ $contactMessage->message }}</p>
                </div>

                @if($contactMessage->reply)
                    <hr>
                    <div class="alert alert-success">
                        <h5 class="alert-heading">
                            <i class="bi bi-reply-fill me-2"></i>Balasan Anda
                        </h5>
                        <p class="mb-0" style="white-space: pre-line;">{{ $contactMessage->reply }}</p>
                        <hr>
                        <small class="text-muted">
                            Dibalas pada: {{ $contactMessage->replied_at->format('d F Y H:i') }}
                        </small>
                    </div>
                @endif
            </div>
        </div>

        <!-- Reply Form -->
        @if($contactMessage->status !== 'replied')
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-reply me-2"></i>Balas Pesan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact-messages.reply', $contactMessage) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply" class="form-label">Balasan <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('reply') is-invalid @enderror" 
                                      id="reply" 
                                      name="reply" 
                                      rows="6"
                                      placeholder="Tulis balasan Anda..."
                                      required>{{ old('reply') }}</textarea>
                            @error('reply')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-2"></i>Kirim Balasan
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <div class="col-lg-4">
        <!-- Sender Info -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-person me-2"></i>Informasi Pengirim
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Nama</small>
                    <strong>{{ $contactMessage->name }}</strong>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block">Email</small>
                    <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                </div>

                @if($contactMessage->phone)
                    <div class="mb-3">
                        <small class="text-muted d-block">Telepon</small>
                        <a href="tel:{{ $contactMessage->phone }}">{{ $contactMessage->phone }}</a>
                    </div>
                @endif

                <div>
                    <small class="text-muted d-block">Dikirim Pada</small>
                    <strong>{{ $contactMessage->created_at->format('d F Y') }}</strong><br>
                    <small class="text-muted">{{ $contactMessage->created_at->format('H:i') }} WIB</small><br>
                    <small class="text-info">{{ $contactMessage->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="card">
            <div class="card-header">
                <i class="bi bi-gear me-2"></i>Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    @if($contactMessage->status === 'read')
                        <form action="{{ route('admin.contact-messages.mark-unread', $contactMessage) }}" 
                              method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="bi bi-envelope me-2"></i>Tandai Belum Dibaca
                            </button>
                        </form>
                    @endif

                    @if($contactMessage->status === 'unread')
                        <form action="{{ route('admin.contact-messages.mark-read', $contactMessage) }}" 
                              method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info w-100">
                                <i class="bi bi-envelope-open me-2"></i>Tandai Sudah Dibaca
                            </button>
                        </form>
                    @endif

                    <hr>

                    <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" 
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash me-2"></i>Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection