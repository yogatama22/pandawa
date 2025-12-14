{{-- resources/views/admin/team-members/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Team Member</h2>
            <p class="text-muted mb-0">Update informasi team member</p>
        </div>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil me-2"></i>Form Edit Team Member
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $teamMember->name) }}" placeholder="e.g., John Doe"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                                name="position" value="{{ old('position', $teamMember->position) }}"
                                placeholder="e.g., CEO, Designer, Developer" required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4"
                                placeholder="Brief description about the team member">{{ old('bio', $teamMember->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>

                            @if($teamMember->photo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($teamMember->photo) }}" alt="{{ $teamMember->name }}"
                                        class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                    <p class="small text-muted mt-1">Photo saat ini</p>
                                </div>
                            @endif

                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                name="photo" accept="image/*" onchange="previewPhoto(event)">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah photo. Format: JPG, JPEG, PNG,
                                GIF. Max: 2MB</small>

                            <div id="photoPreview" class="mt-3" style="display: none;">
                                <p class="small text-muted">Preview photo baru:</p>
                                <img id="preview" src="" alt="Preview" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $teamMember->email) }}"
                                    placeholder="email@example.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone', $teamMember->phone) }}"
                                    placeholder="+62 xxx-xxxx-xxxx">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order"
                                    name="order" value="{{ old('order', $teamMember->order) }}" min="0" required>
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Urutan tampilan (0 = pertama)</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active"
                                    name="is_active">
                                    <option value="1" {{ old('is_active', $teamMember->is_active) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ old('is_active', $teamMember->is_active) == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Update Team Member
                            </button>
                            <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
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
                            <td>{{ $teamMember->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Terakhir Update:</td>
                            <td>{{ $teamMember->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status:</td>
                            <td>
                                <span class="badge {{ $teamMember->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $teamMember->is_active ? 'Active' : 'Inactive' }}
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
                        <li>Upload photo baru hanya jika ingin mengubah</li>
                        <li>Gunakan photo dengan kualitas baik</li>
                        <li>Photo sebaiknya rasio 1:1 (persegi)</li>
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