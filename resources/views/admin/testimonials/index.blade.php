@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Testimonials Management</h2>
            <p class="text-muted mb-0">Kelola testimoni dari klien</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Testimonial
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-chat-quote me-2"></i>Daftar Testimonials</span>
            <span class="badge bg-primary">{{ $testimonials->count() }} Testimonials</span>
        </div>
        <div class="card-body">
            @if($testimonials->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Photo</th>
                                <th>Client Name</th>
                                <th>Position & Company</th>
                                <th>Testimonial</th>
                                <th style="width: 100px;">Rating</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 150px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        @if($testimonial->client_photo)
                                            <img src="{{ Storage::url($testimonial->client_photo) }}"
                                                alt="{{ $testimonial->client_name }}" class="img-thumbnail"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                                <i class="bi bi-person text-muted fs-4"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $testimonial->client_name }}</strong>
                                    </td>
                                    <td>
                                        @if($testimonial->client_position)
                                            <span class="badge bg-info">{{ $testimonial->client_position }}</span>
                                        @endif
                                        @if($testimonial->client_company)
                                            <br>
                                            <small class="text-muted">{{ $testimonial->client_company }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ Str::limit($testimonial->testimonial, 80) }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->rating)
                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <small class="text-muted">{{ $testimonial->rating }}/5</small>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.testimonials.toggle', $testimonial) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm {{ $testimonial->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($testimonial->is_active)
                                                    <i class="bi bi-check-circle me-1"></i>Active
                                                @else
                                                    <i class="bi bi-x-circle me-1"></i>Inactive
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus testimonial ini?')">
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
                    <i class="bi bi-chat-quote text-muted" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Testimonial</h5>
                    <p class="text-muted">Klik tombol "Tambah Testimonial" untuk menambahkan testimonial baru</p>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Testimonial Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection