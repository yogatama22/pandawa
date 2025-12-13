@extends('admin.layouts.app')

@section('title', 'Tambah Project')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Tambah Project Baru</h2>
        <p class="text-muted mb-0">Buat project portfolio baru</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Info -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Informasi Dasar
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Project <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
                               placeholder="e.g., Cotton House Interior Design"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('category') is-invalid @enderror" 
                                   id="category" 
                                   name="category" 
                                   value="{{ old('category') }}"
                                   list="categoryList"
                                   placeholder="e.g., Interior, Exterior, Urban"
                                   required>
                            <datalist id="categoryList">
                                <option value="Interior">
                                <option value="Exterior">
                                <option value="Urban">
                                <option value="Planning">
                                <option value="Residential">
                                <option value="Commercial">
                            </datalist>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="project_type" class="form-label">Tipe Project</label>
                            <input type="text" 
                                   class="form-control @error('project_type') is-invalid @enderror" 
                                   id="project_type" 
                                   name="project_type" 
                                   value="{{ old('project_type') }}"
                                   placeholder="e.g., Residential, Commercial">
                            @error('project_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                  id="short_description" 
                                  name="short_description" 
                                  rows="2"
                                  maxlength="500"
                                  placeholder="Deskripsi singkat untuk card preview (max 500 karakter)">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="6"
                                  placeholder="Deskripsi detail tentang project ini..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-file-text me-2"></i>Detail Project
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="client_name" class="form-label">Nama Client</label>
                            <input type="text" 
                                   class="form-control @error('client_name') is-invalid @enderror" 
                                   id="client_name" 
                                   name="client_name" 
                                   value="{{ old('client_name') }}"
                                   placeholder="e.g., PT. Example Company">
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" 
                                   class="form-control @error('location') is-invalid @enderror" 
                                   id="location" 
                                   name="location" 
                                   value="{{ old('location') }}"
                                   placeholder="e.g., Jakarta, Indonesia">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="year" class="form-label">Tahun</label>
                            <input type="number" 
                                   class="form-control @error('year') is-invalid @enderror" 
                                   id="year" 
                                   name="year" 
                                   value="{{ old('year', date('Y')) }}"
                                   min="1900"
                                   max="{{ date('Y') + 10 }}">
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="area" class="form-label">Luas Area (m²)</label>
                            <input type="number" 
                                   class="form-control @error('area') is-invalid @enderror" 
                                   id="area" 
                                   name="area" 
                                   value="{{ old('area') }}"
                                   step="0.01"
                                   min="0"
                                   placeholder="e.g., 250.5">
                            @error('area')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="duration" class="form-label">Durasi (hari)</label>
                            <input type="number" 
                                   class="form-control @error('duration') is-invalid @enderror" 
                                   id="duration" 
                                   name="duration" 
                                   value="{{ old('duration') }}"
                                   min="0"
                                   placeholder="e.g., 180">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-images me-2"></i>Galeri Gambar Project
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail Utama <span class="text-danger">*</span></label>
                        <input type="file" 
                               class="form-control @error('thumbnail') is-invalid @enderror" 
                               id="thumbnail" 
                               name="thumbnail"
                               accept="image/*"
                               onchange="previewThumbnail(event)"
                               required>
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Gambar utama untuk list/card. Max: 2MB</small>
                        
                        <div id="thumbnailPreview" class="mt-3" style="display: none;">
                            <img id="thumbnailImg" src="" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Gambar Galeri (Multiple)</label>
                        <input type="file" 
                               class="form-control @error('images.*') is-invalid @enderror" 
                               id="images" 
                               name="images[]"
                               accept="image/*"
                               multiple
                               onchange="previewGallery(event)">
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Pilih beberapa gambar sekaligus untuk galeri project. Max 2MB per gambar</small>
                        
                        <div id="galleryPreview" class="row mt-3 g-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-gear me-2"></i>Pengaturan
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('order') is-invalid @enderror" 
                               id="order" 
                               name="order" 
                               value="{{ old('order', 0) }}"
                               min="0"
                               required>
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Urutan tampilan (0 = pertama)</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="is_featured" 
                                   name="is_featured"
                                   value="1"
                                   {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                <i class="bi bi-star text-warning me-1"></i>
                                <strong>Featured Project</strong>
                            </label>
                        </div>
                        <small class="text-muted">Tampilkan di homepage sebagai highlight</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="is_active" 
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                <strong>Active</strong>
                            </label>
                        </div>
                        <small class="text-muted">Project aktif akan ditampilkan di website</small>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lightbulb me-2"></i>Tips
                </div>
                <div class="card-body">
                    <ul class="small mb-0">
                        <li>Gunakan judul yang menarik dan deskriptif</li>
                        <li>Thumbnail harus berkualitas tinggi</li>
                        <li>Upload minimal 3-5 gambar untuk galeri</li>
                        <li>Isi semua detail project untuk tampilan optimal</li>
                        <li>Centang "Featured" untuk highlight di homepage</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i>Simpan Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
function previewThumbnail(event) {
    const preview = document.getElementById('thumbnailImg');
    const previewDiv = document.getElementById('thumbnailPreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

function previewGallery(event) {
    const previewDiv = document.getElementById('galleryPreview');
    const files = event.target.files;
    
    previewDiv.innerHTML = '';
    
    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-6 col-md-4';
                col.innerHTML = `
                    <div class="position-relative">
                        <img src="${e.target.result}" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 badge bg-primary m-1">${index + 1}</span>
                    </div>
                `;
                previewDiv.appendChild(col);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endpush