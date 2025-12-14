@extends('admin.layouts.app')

@section('title', 'Tambah Contact Info')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Tambah Contact Information</h2>
            <p class="text-muted mb-0">Buat informasi kontak perusahaan</p>
        </div>
        <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.contact-info.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-8">
                <!-- Contact Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-telephone me-2"></i>Contact Details
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" rows="3" placeholder="Company address">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}" placeholder="+62 xxx-xxxx-xxxx">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                    id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                                    placeholder="+62 xxx-xxxx-xxxx">
                                @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="contact@company.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-share me-2"></i>Social Media Links
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook_url" class="form-label">
                                    <i class="ti-facebook me-2"></i>Facebook
                                </label>
                                <input type="url" class="form-control @error('facebook_url') is-invalid @enderror"
                                    id="facebook_url" name="facebook_url" value="{{ old('facebook_url') }}"
                                    placeholder="https://facebook.com/username">
                                @error('facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="instagram_url" class="form-label">
                                    <i class="ti-instagram me-2"></i>Instagram
                                </label>
                                <input type="url" class="form-control @error('instagram_url') is-invalid @enderror"
                                    id="instagram_url" name="instagram_url" value="{{ old('instagram_url') }}"
                                    placeholder="https://instagram.com/username">
                                @error('instagram_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="twitter_url" class="form-label">
                                    <i class="fa-brands fa-x-twitter me-2"></i>Twitter / X
                                </label>
                                <input type="url" class="form-control @error('twitter_url') is-invalid @enderror"
                                    id="twitter_url" name="twitter_url" value="{{ old('twitter_url') }}"
                                    placeholder="https://twitter.com/username">
                                @error('twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tiktok_url" class="form-label">
                                    <i class="fa-brands fa-tiktok me-2"></i>TikTok
                                </label>
                                <input type="url" class="form-control @error('tiktok_url') is-invalid @enderror"
                                    id="tiktok_url" name="tiktok_url" value="{{ old('tiktok_url') }}"
                                    placeholder="https://tiktok.com/@username">
                                @error('tiktok_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="linkedin_url" class="form-label">
                                    <i class="ti-linkedin me-2"></i>LinkedIn
                                </label>
                                <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                    id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}"
                                    placeholder="https://linkedin.com/company/name">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-0">
                                <label for="youtube_url" class="form-label">
                                    <i class="ti-youtube me-2"></i>YouTube
                                </label>
                                <input type="url" class="form-control @error('youtube_url') is-invalid @enderror"
                                    id="youtube_url" name="youtube_url" value="{{ old('youtube_url') }}"
                                    placeholder="https://youtube.com/@channel">
                                @error('youtube_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Embed -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-geo-alt me-2"></i>Google Maps Embed
                    </div>
                    <div class="card-body">
                        <div class="mb-0">
                            <label for="map_embed" class="form-label">Map Embed Code</label>
                            <textarea class="form-control @error('map_embed') is-invalid @enderror" id="map_embed"
                                name="map_embed" rows="5"
                                placeholder='<iframe src="..." width="600" height="450" ...></iframe>'>{{ old('map_embed') }}</textarea>
                            @error('map_embed')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Paste the Google Maps embed iframe code here</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-info-circle me-2"></i>Tips
                    </div>
                    <div class="card-body">
                        <h6>Social Media:</h6>
                        <ul class="small">
                            <li>Pastikan URL lengkap dengan https://</li>
                            <li>Link harus valid dan aktif</li>
                            <li>Kosongkan jika tidak digunakan</li>
                        </ul>

                        <hr>

                        <h6>Google Maps:</h6>
                        <ul class="small mb-0">
                            <li>Buka Google Maps</li>
                            <li>Cari lokasi Anda</li>
                            <li>Klik "Share" → "Embed a map"</li>
                            <li>Copy dan paste kode iframe</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i>Simpan Contact Info
                </button>
                <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </a>
            </div>
        </div>
    </form>
@endsection