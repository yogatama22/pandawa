@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Projects Management</h2>
        <p class="text-muted mb-0">Kelola portfolio project perusahaan</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Project
    </a>
</div>

<!-- Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.projects.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Filter Kategori</label>
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Filter Featured</label>
                <select name="featured" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>Not Featured</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-folder me-2"></i>Daftar Projects</span>
        <span class="badge bg-primary">{{ $projects->count() }} Projects</span>
    </div>
    <div class="card-body">
        @if($projects->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Order</th>
                            <th style="width: 100px;">Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th style="width: 100px;">Featured</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 180px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">{{ $project->order }}</span>
                                </td>
                                <td>
                                    @if($project->thumbnail)
                                        <img src="{{ Storage::url($project->thumbnail) }}" 
                                             alt="{{ $project->title }}" 
                                             class="img-thumbnail"
                                             style="width: 80px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 50px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $project->title }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ Str::limit($project->short_description, 50) }}
                                    </small>
                                    <br>
                                    <small class="text-info">
                                        <i class="bi bi-images me-1"></i>{{ $project->images->count() }} images
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $project->category }}</span>
                                </td>
                                <td>
                                    @if($project->client_name)
                                        <strong>{{ $project->client_name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $project->location }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.projects.toggle-featured', $project) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm {{ $project->is_featured ? 'btn-warning' : 'btn-outline-secondary' }}"
                                                title="Toggle Featured">
                                            @if($project->is_featured)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.projects.toggle', $project) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm {{ $project->is_active ? 'btn-success' : 'btn-secondary' }}">
                                            @if($project->is_active)
                                                <i class="bi bi-check-circle me-1"></i>Active
                                            @else
                                                <i class="bi bi-x-circle me-1"></i>Inactive
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.projects.show', $project) }}" 
                                           class="btn btn-sm btn-info"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}" 
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus project ini beserta semua gambarnya?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-folder text-muted" style="font-size: 4rem;"></i>
                <h5 class="mt-3 text-muted">Belum Ada Project</h5>
                <p class="text-muted">Klik tombol "Tambah Project" untuk membuat project baru</p>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mt-2">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Project Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection