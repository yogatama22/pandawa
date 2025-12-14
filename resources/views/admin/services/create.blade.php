@extends('admin.layouts.app')

@section('title', 'Tambah Service')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Tambah Service Baru</h2>
            <p class="text-muted mb-0">Buat layanan baru untuk perusahaan</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-plus-circle me-2"></i>Form Service
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" placeholder="e.g., Architecture" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="5" placeholder="Deskripsi detail tentang service..."
                                required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Class/Name</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" value="{{ old('icon') }}" placeholder="e.g., icon-1.png atau bi-building">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Nama file icon (e.g., icon-1.png) atau class icon (e.g.,
                                bi-building)</small>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" onchange="previewImage(event)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: JPG, JPEG, PNG, GIF. Max: 2MB. Optional jika menggunakan
                                icon</small>

                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="preview" src="" alt="Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order"
                                    name="order" value="{{ old('order', 0) }}" min="0" required>
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Urutan tampilan (0 = pertama)</small>
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
                                <i class="bi bi-save me-2"></i>Simpan Service
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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
                        <li>Gunakan judul yang jelas dan deskriptif</li>
                        <li>Icon atau Image bisa digunakan salah satu</li>
                        <li>Jika menggunakan icon, pastikan file ada di folder public/img/icons/</li>
                        <li>Order menentukan urutan tampilan service</li>
                        <li>Set status Active agar service ditampilkan</li>
                    </ul>

                    <hr>

                    <h6>Icon Files:</h6>
                    <p class="small mb-0">
                        Letakkan file icon di: <code>public/img/icons/</code><br>
                        Contoh: icon-1.png, icon-2.png
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewDiv = document.getElementById('imagePreview');
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