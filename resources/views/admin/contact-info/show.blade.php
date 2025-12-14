@extends('admin.layouts.app')

@section('title', 'Detail Contact Info')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Detail Contact Info</h2>
            <p class="text-muted mb-0">Informasi lengkap kontak perusahaan</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.contact-info.edit', $contact) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Contact Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-telephone me-2"></i>Contact Details
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Address</h5>
                        <p class="text-muted mb-0">{{ $contact->address ?? '-' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5 class="text-muted mb-2">Phone</h5>
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                    <strong>{{ $contact->phone }}</strong>
                                </a>
                            @else
                                <p class="text-muted mb-0">-</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5 class="text-muted mb-2">WhatsApp</h5>
                            @if($contact->whatsapp)
                                <strong>{{ $contact->whatsapp }}</strong>
                            @else
                                <p class="text-muted mb-0">-</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-0">
                        <h5 class="text-muted mb-2">Email</h5>
                        @if($contact->email)
                            <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                <strong>{{ $contact->email }}</strong>
                            </a>
                        @else
                            <p class="text-muted mb-0">-</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-share me-2"></i>Social Media Links
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th style="width: 180px;">
                                        <i class="ti-facebook me-2"></i>Facebook
                                    </th>
                                    <td>
                                        @if($contact->facebook_url)
                                            <a href="{{ $contact->facebook_url }}" target="_blank">
                                                {{ $contact->facebook_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <i class="ti-instagram me-2"></i>Instagram
                                    </th>
                                    <td>
                                        @if($contact->instagram_url)
                                            <a href="{{ $contact->instagram_url }}" target="_blank">
                                                {{ $contact->instagram_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <i class="fa-brands fa-x-twitter me-2"></i>Twitter / X
                                    </th>
                                    <td>
                                        @if($contact->twitter_url)
                                            <a href="{{ $contact->twitter_url }}" target="_blank">
                                                {{ $contact->twitter_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <i class="ti-linkedin me-2"></i>LinkedIn
                                    </th>
                                    <td>
                                        @if($contact->linkedin_url)
                                            <a href="{{ $contact->linkedin_url }}" target="_blank">
                                                {{ $contact->linkedin_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <i class="fa-brands fa-tiktok me-2"></i>TikTok
                                    </th>
                                    <td>
                                        @if($contact->tiktok_url)
                                            <a href="{{ $contact->tiktok_url }}" target="_blank">
                                                {{ $contact->tiktok_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <i class="ti-youtube me-2"></i>YouTube
                                    </th>
                                    <td>
                                        @if($contact->youtube_url)
                                            <a href="{{ $contact->youtube_url }}" target="_blank">
                                                {{ $contact->youtube_url }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Map Preview -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-geo-alt me-2"></i>Google Maps
                </div>
                <div class="card-body">
                    @if($contact->map_embed)
                        <div class="ratio ratio-16x9">
                            {!! $contact->map_embed !!}
                        </div>
                        <small class="text-muted d-block mt-2">Preview embed di atas (pastikan iframe valid).</small>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-geo text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2 mb-0">Map embed belum diisi</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Timeline -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-clock-history me-2"></i>Timeline
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Dibuat</small>
                        <strong>{{ optional($contact->created_at)->format('d F Y') ?? '-' }}</strong>
                        <br>
                        <small class="text-muted">{{ optional($contact->created_at)->format('H:i') ?? '-' }} WIB</small>
                    </div>

                    <div>
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <strong>{{ optional($contact->updated_at)->format('d F Y') ?? '-' }}</strong>
                        <br>
                        <small class="text-muted">{{ optional($contact->updated_at)->format('H:i') ?? '-' }} WIB</small>

                        @if($contact->created_at && $contact->updated_at && $contact->updated_at->diffInDays($contact->created_at) > 0)
                            <br>
                            <small class="text-info">
                                <i class="bi bi-info-circle me-1"></i>
                                {{ $contact->updated_at->diffForHumans($contact->created_at) }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-gear me-2"></i>Actions
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.contact-info.edit', $contact) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-2"></i>Edit Contact Info
                        </a>

                        <a href="{{ route('admin.contact-info.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Tips -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Tips
                </div>
                <div class="card-body">
                    <ul class="small mb-0">
                        <li>Pastikan link social media memakai <code>https://</code></li>
                        <li>Untuk Maps, gunakan embed iframe dari Google Maps</li>
                        <li>Cek kembali Phone/WhatsApp agar sesuai format</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection