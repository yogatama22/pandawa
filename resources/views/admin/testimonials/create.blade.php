@extends('admin.layouts.app')

@section('title', 'Tambah Testimonial')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Tambah Testimonial Baru</h2>
            <p class="text-muted mb-0">Tambahkan testimoni dari klien</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2"></i>Form Testimonial
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="client_name" class="form-label">Client Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                id="client_name" name="client_name" value="{{ old('client_name') }}"
                                placeholder="e.g., John Doe" required>
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client_position" class="form-label">Position</label>
                                <input type="text" class="form-control @error('client_position') is-invalid @enderror"
                                    id="client_position" name="client_position" value="{{ old('client_position') }}"
                                    placeholder="e.g., CEO, Director">
                                @error('client_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="client_company" class="form-label">Company</label>
                                <input type="text" class="form-control @error('client_company') is-invalid @enderror"
                                    id="client_company" name="client_company" value="{{ old('client_company') }}"
                                    placeholder="e.g., ABC Corporation">
                                @error('client_company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="testimonial" class="form-label">Testimonial <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('testimonial') is-invalid @enderror" id="testimonial"
                                name="testimonial" rows="5" placeholder="Write the client's testimonial here..."
                                required>{{ old('testimonial') }}</textarea>
                            @error('testimonial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="client_photo" class="form-label">Client Photo</label>
                            <input type="file" class="form-control @error('client_photo') is-invalid @enderror"
                                id="client_photo" name="client_photo" accept="image/*" onchange="previewPhoto(event)">
                            @error('client_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB. Recommended: Square photo</small>

                            <div id="photoPreview" class="mt-3" style="display: none;">
                                <img id="preview" src="" alt="Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px; border-radius: 50%;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                                <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating"
                                    required>
                                    <option value="">Select Rating</option>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                        </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Rating: 1 (lowest) to 5 (highest)</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active"
                                    name="is_active">
                                    <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Simpan Testimonial
                            </button>
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Informasi
                </div>
                <div class="card-body">
                    <h6>Tips:</h6>
                    <ul class="small">
                        <li>Gunakan testimoni yang jujur dan spesifik</li>
                        <li>Photo sebaiknya formal dan professional</li>
                        <li>Cantumkan posisi dan perusahaan untuk kredibilitas</li>
                        <li>Rating harus sesuai dengan isi testimonial</li>
                        <li>Set status Active agar ditampilkan di website</li>
                    </ul>

                    <hr>

                    <h6>Rating Guide:</h6>
                    <ul class="small mb-0">
                        <li><strong>5 Stars:</strong> Sangat Puas</li>
                        <li><strong>4 Stars:</strong> Puas</li>
                        <li><strong>3 Stars:</strong> Cukup Puas</li>
                        <li><strong>2 Stars:</strong> Kurang Puas</li>
                        <li><strong>1 Star:</strong> Tidak Puas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewPhoto(event) {
            const preview = document.getElementById('preview');
            const previewDiv = document.getElementById('photoPreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    previewDiv.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush