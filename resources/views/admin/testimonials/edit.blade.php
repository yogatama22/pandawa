@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Edit Testimonial</h2>
        <p class="text-muted mb-0">Update informasi testimonial</p>
    </div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil me-2"></i>Form Edit Testimonial
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('client_name') is-invalid @enderror" 
                               id="client_name" 
                               name="client_name" 
                               value="{{ old('client_name', $testimonial->client_name) }}"
                               placeholder="e.g., John Doe" 
                               required>
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="client_position" class="form-label">Position</label>
                            <input type="text" 
                                   class="form-control @error('client_position') is-invalid @enderror" 
                                   id="client_position" 
                                   name="client_position" 
                                   value="{{ old('client_position', $testimonial->client_position) }}"
                                   placeholder="e.g., CEO, Director">
                            @error('client_position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="client_company" class="form-label">Company</label>
                            <input type="text" 
                                   class="form-control @error('client_company') is-invalid @enderror" 
                                   id="client_company" 
                                   name="client_company" 
                                   value="{{ old('client_company', $testimonial->client_company) }}"
                                   placeholder="e.g., ABC Corporation">
                            @error('client_company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="testimonial" class="form-label">Testimonial <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('testimonial') is-invalid @enderror" 
                                  id="testimonial" 
                                  name="testimonial" 
                                  rows="5"
                                  placeholder="Write the client's testimonial here..."
                                  required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                        @error('testimonial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="client_photo" class="form-label">Client Photo</label>

                        @if($testimonial->client_photo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($testimonial->client_photo) }}" 
                                     alt="{{ $testimonial->client_name }}"
                                     class="img-thumbnail" 
                                     style="max-width: 200px; max-height: 200px; border-radius: 50%;">
                                <p class="small text-muted mt-1">Photo saat ini</p>
                            </div>
                        @endif

                        <input type="file" 
                               class="form-control @error('client_photo') is-invalid @enderror" 
                               id="client_photo" 
                               name="client_photo"
                               accept="image/*"
                               onchange="previewPhoto(event)">
                        @error('client_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah photo. Format: JPG, PNG, GIF. Max: 2MB</small>

                        <div id="photoPreview" class="mt-3" style="display: none;">
                            <p class="small text-muted">Preview photo baru:</p>
                            <img id="preview" src="" alt="Preview" class="img-thumbnail" 
                                 style="max-width: 200px; max-height: 200px; border-radius: 50%;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                            <select class="form-select @error('rating') is-invalid @enderror" 
                                    id="rating" 
                                    name="rating"
                                    required>
                                <option value="">Select Rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
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
                            <select class="form-select @error('is_active') is-invalid @enderror" 
                                    id="is_active" 
                                    name="is_active">
                                <option value="1" {{ old('is_active', $testimonial->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $testimonial->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Update Testimonial
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
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Informasi
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td class="text-muted">Dibuat:</td>
                        <td>{{ $testimonial->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Terakhir Update:</td>
                        <td>{{ $testimonial->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Status:</td>
                        <td>
                            <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Rating:</td>
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
                    <li>Upload photo baru hanya jika ingin mengubah</li>
                    <li>Pastikan testimonial tetap relevan</li>
                    <li>Update rating jika perlu</li>
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
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
@endsection