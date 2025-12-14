@extends('admin.layouts.app')

@section('title', 'Edit Company Settings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Edit Company Settings</h2>
            <p class="text-muted mb-0">Update informasi perusahaan dan halaman about</p>
        </div>
        <a href="{{ route('admin.company-settings.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Company Profile Form -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-building me-2"></i>Company Profile
        </div>
        <div class="card-body">
            <form action="{{ route('admin.company-settings.update-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                id="company_name" name="company_name"
                                value="{{ old('company_name', $company->company_name) }}" required>
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tagline" class="form-label">Tagline</label>
                            <input type="text" class="form-control @error('tagline') is-invalid @enderror" id="tagline"
                                name="tagline" value="{{ old('tagline', $company->tagline) }}"
                                placeholder="e.g., Building Dreams, Creating Reality">
                            @error('tagline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4"
                                placeholder="Brief description about your company">{{ old('description', $company->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">SEO Settings</h6>

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                id="meta_title" name="meta_title" value="{{ old('meta_title', $company->meta_title) }}"
                                placeholder="SEO title for search engines">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                id="meta_description" name="meta_description" rows="3"
                                placeholder="SEO description (max 160 characters)">{{ old('meta_description', $company->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Optimal length: 150-160 characters</small>
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                id="meta_keywords" name="meta_keywords"
                                value="{{ old('meta_keywords', $company->meta_keywords) }}"
                                placeholder="keyword1, keyword2, keyword3">
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Separate with commas</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            @if($company->logo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($company->logo) }}" alt="Current Logo"
                                        class="img-thumbnail d-block"
                                        style="max-width: 200px; max-height: 100px; object-fit: contain;">
                                    <small class="text-muted">Current logo</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                name="logo" accept="image/*" onchange="previewLogo(event)">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: JPG, PNG, SVG. Max: 2MB</small>

                            <div id="logoPreview" class="mt-2" style="display: none;">
                                <img id="logoImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="favicon" class="form-label">Favicon</label>
                            @if($company->favicon)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($company->favicon) }}" alt="Current Favicon"
                                        class="img-thumbnail d-block" style="width: 50px; height: 50px; object-fit: contain;">
                                    <small class="text-muted">Current favicon</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('favicon') is-invalid @enderror" id="favicon"
                                name="favicon" accept=".png,.ico">
                            @error('favicon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: PNG, ICO. Max: 1MB. Size: 32x32px</small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i>Update Company Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- About Information Form -->
    <div class="card">
        <div class="card-header bg-info text-white">
            <i class="bi bi-info-circle me-2"></i>About Information
        </div>
        <div class="card-body">
            <form action="{{ route('admin.company-settings.update-about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $about->title) }}" placeholder="e.g., About Our Company"
                                required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="6" placeholder="Tell your company story..."
                                required>{{ old('description', $about->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea class="form-control @error('mission') is-invalid @enderror" id="mission"
                                name="mission" rows="4"
                                placeholder="Our mission statement...">{{ old('mission', $about->mission) }}</textarea>
                            @error('mission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision"
                                rows="4"
                                placeholder="Our vision for the future...">{{ old('vision', $about->vision) }}</textarea>
                            @error('vision')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">About Image</label>
                            @if($about->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($about->image) }}" alt="Current Image"
                                        class="img-thumbnail d-block"
                                        style="width: 100%; max-height: 200px; object-fit: cover;">
                                    <small class="text-muted">Current image</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" onchange="previewAboutImage(event)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>

                            <div id="aboutImagePreview" class="mt-2" style="display: none;">
                                <small class="text-muted d-block">Preview:</small>
                                <img id="aboutImg" src="" alt="Preview" class="img-thumbnail" style="width: 100%;">
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <small>
                                <i class="bi bi-info-circle me-1"></i>
                                <strong>Tips:</strong> Use high-quality images that represent your company culture and
                                values.
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-info text-white">
                        <i class="bi bi-save me-2"></i>Update About Information
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="{{ route('admin.company-settings.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Company Settings
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        function previewLogo(event) {
            const preview = document.getElementById('logoImg');
            const previewDiv = document.getElementById('logoPreview');
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

        function previewAboutImage(event) {
            const preview = document.getElementById('aboutImg');
            const previewDiv = document.getElementById('aboutImagePreview');
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