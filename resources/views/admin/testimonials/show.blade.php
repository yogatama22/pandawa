@extends('admin.layouts.app')

@section('title', 'Detail Testimonial')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Detail Testimonial</h2>
            <p class="text-muted mb-0">Informasi lengkap testimonial</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-person-circle me-2"></i>Client Photo
                </div>
                <div class="card-body text-center">
                    @if($testimonial->client_photo)
                        <img src="{{ Storage::url($testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}"
                            class="img-fluid rounded-circle shadow"
                            style="max-width: 300px; max-height: 300px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded-circle mx-auto shadow"
                            style="width: 300px; height: 300px;">
                            <div class="text-center">
                                <i class="bi bi-person text-muted" style="font-size: 8rem;"></i>
                                <p class="text-muted mt-3">Tidak ada photo</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-file-text me-2"></i>Informasi Client
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Client Name</h5>
                        <h3>{{ $testimonial->client_name }}</h3>
                    </div>

                    <div class="row mb-4">
                        @if($testimonial->client_position)
                            <div class="col-md-6">
                                <h5 class="text-muted mb-2">Position</h5>
                                <span class="badge bg-info fs-6">{{ $testimonial->client_position }}</span>
                            </div>
                        @endif

                        @if($testimonial->client_company)
                            <div class="col-md-6">
                                <h5 class="text-muted mb-2">Company</h5>
                                <p><strong>{{ $testimonial->client_company }}</strong></p>
                            </div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Rating</h5>
                        <div class="d-flex align-items-center">
                            <div class="text-warning fs-4 me-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="badge bg-warning fs-6">{{ $testimonial->rating }}/5</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Status</h5>
                        <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            <i class="bi {{ $testimonial->is_active ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                            {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="bi bi-chat-quote me-2"></i>Testimonial
                </div>
                <div class="card-body">
                    <div class="position-relative p-4" style="background-color: #f8f9fa; border-left: 4px solid #0d6efd;">
                        <i class="bi bi-quote text-primary"
                            style="font-size: 3rem; position: absolute; top: 10px; left: 10px; opacity: 0.2;"></i>
                        <p class="mb-0 position-relative" style="font-size: 1.1rem; line-height: 1.8; padding-left: 40px;">
                            {{ $testimonial->testimonial }}
                        </p>
                        <div class="text-end mt-3">
                            <small class="text-muted">
                                — {{ $testimonial->client_name }}
                                @if($testimonial->client_position || $testimonial->client_company)
                                    ,
                                    @if($testimonial->client_position)
                                        {{ $testimonial->client_position }}
                                    @endif
                                    @if($testimonial->client_company)
                                        at {{ $testimonial->client_company }}
                                    @endif
                                @endif
                            </small>
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
                        <strong>{{ $testimonial->created_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $testimonial->created_at->format('H:i') }} WIB</small>
                    </div>

                    <div>
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <strong>{{ $testimonial->updated_at->format('d F Y') }}</strong>
                        <br>
                        <small class="text-muted">{{ $testimonial->updated_at->format('H:i') }} WIB</small>
                        @if($testimonial->updated_at->diffInDays($testimonial->created_at) > 0)
                            <br>
                            <small class="text-info">
                                <i class="bi bi-info-circle me-1"></i>
                                {{ $testimonial->updated_at->diffForHumans($testimonial->created_at) }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-bar-chart me-2"></i>Quick Stats
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Rating Level</small>
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-{{ $testimonial->rating >= 4 ? 'success' : ($testimonial->rating >= 3 ? 'warning' : 'danger') }}"
                                role="progressbar" style="width: {{ ($testimonial->rating / 5) * 100 }}%;"
                                aria-valuenow="{{ $testimonial->rating }}" aria-valuemin="0" aria-valuemax="5">
                                {{ $testimonial->rating }}/5
                            </div>
                        </div>
                    </div>

                    <div>
                        <small class="text-muted d-block">Testimonial Length</small>
                        <p class="mb-0">
                            <strong>{{ strlen($testimonial->testimonial) }}</strong> characters
                            <br>
                            <strong>{{ str_word_count($testimonial->testimonial) }}</strong> words
                        </p>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-gear me-2"></i>Actions
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit Testimonial
                        </a>

                        <form action="{{ route('admin.testimonials.toggle', $testimonial) }}" method="POST"
                            onsubmit="return confirm('Ubah status testimonial?')">
                            @csrf
                            <button type="submit"
                                class="btn w-100 {{ $testimonial->is_active ? 'btn-secondary' : 'btn-success' }}">
                                <i class="bi {{ $testimonial->is_active ? 'bi-x-circle' : 'bi-check-circle' }} me-2"></i>
                                {{ $testimonial->is_active ? 'Set Inactive' : 'Set Active' }}
                            </button>
                        </form>

                        <hr>

                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus testimonial ini? Tindakan ini tidak dapat dibatalkan!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash me-2"></i>Hapus Testimonial
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Display Info
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        Testimonial ini akan ditampilkan di:
                    </small>
                    <ul class="small mt-2 mb-0">
                        <li>Homepage - Testimonials Section</li>
                        <li>About Page (jika aktif)</li>
                        <li>Services Page (jika aktif)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection