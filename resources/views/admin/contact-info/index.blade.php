@extends('admin.layouts.app')

@section('title', 'Contact Information')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Contact Information</h2>
        <p class="text-muted mb-0">Kelola informasi kontak perusahaan</p>
    </div>

    @if(!$contact)
        <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Contact Info
        </a>
    @else
        <!-- <a href="{{ route('admin.contact-info.edit', $contact->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit Contact Info
        </a> -->
    @endif
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-telephone me-2"></i>Contact Info Detail</span>
        <span class="badge bg-primary">
            {{ $contact ? '1 Data' : 'Belum Ada Data' }}
        </span>
    </div>

    <div class="card-body">
        @if($contact)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">Address</th>
                            <td>{{ $contact->address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $contact->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>WhatsApp</th>
                            <td>{{ $contact->whatsapp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Facebook</th>
                            <td>
                                @if($contact->facebook_url)
                                    <a href="{{ $contact->facebook_url }}" target="_blank">
                                        {{ $contact->facebook_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Instagram</th>
                            <td>
                                @if($contact->instagram_url)
                                    <a href="{{ $contact->instagram_url }}" target="_blank">
                                        {{ $contact->instagram_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Twitter / X</th>
                            <td>
                                @if($contact->twitter_url)
                                    <a href="{{ $contact->twitter_url }}" target="_blank">
                                        {{ $contact->twitter_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>LinkedIn</th>
                            <td>
                                @if($contact->linkedin_url)
                                    <a href="{{ $contact->linkedin_url }}" target="_blank">
                                        {{ $contact->linkedin_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>TikTok</th>
                            <td>
                                @if($contact->tiktok_url)
                                    <a href="{{ $contact->tiktok_url }}" target="_blank">
                                        {{ $contact->tiktok_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>YouTube</th>
                            <td>
                                @if($contact->youtube_url)
                                    <a href="{{ $contact->youtube_url }}" target="_blank">
                                        {{ $contact->youtube_url }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Google Maps</th>
                            <td>
                                @if($contact->map_embed)
                                    <span class="badge bg-success">Embed tersedia</span>
                                @else
                                    <span class="badge bg-secondary">Belum diisi</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('admin.contact-info.edit', $contact->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Edit Contact Info
                </a>
            </div>
        @else
            <!-- Fallback jika belum ada data -->
            <div class="text-center py-5">
                <i class="bi bi-telephone text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Contact Info</h5>
                <p class="text-muted">
                    Informasi kontak perusahaan belum dibuat.
                </p>
                <a href="{{ route('admin.contact-info.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Contact Info
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
