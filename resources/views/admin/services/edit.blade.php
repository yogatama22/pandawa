@extends('admin.layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Service</h2>
            <p class="text-muted mb-0">Update informasi service</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil me-2"></i>Form Edit Service
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.update', $service) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $service->title) }}" placeholder="e.g., Architecture"
                                required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="5" placeholder="Deskripsi detail tentang service..."
                                required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Class/Name</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                                name="icon" value="{{ old('icon', $service->icon) }}"
                                placeholder="e.g., icon-1.png atau bi-building">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Nama file icon atau class icon</small>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>

                            @if($service->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}"
                                        class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                    <p class="small text-muted mt-1">Image saat ini</p>
                                </div>
                            @endif

                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" onchange="previewImage(event)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah image. Format: JPG, JPEG, PNG,
                                GIF. Max: 2MB</small>

                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <p class="small text-muted">Preview image baru:</p>
                                <img id="preview" src="" alt="Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order"
                                    name="order" value="{{ old('order', $service->order) }}" min="0" required>
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Urutan tampilan (0 = pertama)</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active"
                                    name="is_active">
                                    <option value="1" {{ old('is_active', $service->is_active) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('is_active', $service->is_active) == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Update Service
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
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Informasi Service
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="text-muted">Dibuat:</td>
                            <td>{{ $service->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Terakhir Update:</td>
                            <td>{{ $service->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status:</td>
                            <td>
                                <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lightbulb me-2"></i>Tips
                </div>
                <div class="card-body">
                    <ul class="small mb-0">
                        <li>Upload image baru hanya jika ingin mengubah</li>
                        <li>Gunakan image dengan kualitas baik</li>
                        <li>Icon dan Image bisa digunakan salah satu atau keduanya</li>
                        <li>Order menentukan urutan tampilan service</li>
                    </ul>
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