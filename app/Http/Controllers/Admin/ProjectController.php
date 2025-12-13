<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::with('images');

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by featured
        if ($request->has('featured') && $request->featured != '') {
            $query->where('is_featured', $request->featured);
        }

        $projects = $query->orderBy('order')->orderBy('created_at', 'desc')->get();
        $categories = Project::distinct()->pluck('category');

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'project_type' => 'nullable|string|max:255',
            'area' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Judul project wajib diisi.',
            'category.required' => 'Kategori project wajib diisi.',
            'description.required' => 'Deskripsi project wajib diisi.',
            'thumbnail.required' => 'Thumbnail project wajib diupload.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.',
            'year.integer' => 'Tahun harus berupa angka.',
            'year.min' => 'Tahun tidak valid.',
            'year.max' => 'Tahun tidak valid.',
        ]);

        // Set default values
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
        }

        // Create project
        $project = Project::create($validated);

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->store('projects/gallery', 'public');
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imagePath,
                    'caption' => $request->captions[$index] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('images');
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load('images');
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'project_type' => 'nullable|string|max:255',
            'area' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ]);

        // Set default values
        $validated['is_featured'] = $request->has('is_featured') ? true : false;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
        }

        // Update project
        $project->update($validated);

        // Handle new images upload
        if ($request->hasFile('images')) {
            $existingCount = $project->images()->count();
            
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->store('projects/gallery', 'public');
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imagePath,
                    'caption' => $request->captions[$index] ?? null,
                    'order' => $existingCount + $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            // Delete thumbnail
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            // Delete all project images
            foreach ($project->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }

            $project->delete();

            return redirect()->route('admin.projects.index')
                ->with('success', 'Project berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.projects.index')
                ->with('error', 'Gagal menghapus project: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the active status of the project.
     */
    public function toggle(Project $project)
    {
        try {
            $project->update(['is_active' => !$project->is_active]);
            
            $status = $project->is_active ? 'diaktifkan' : 'dinonaktifkan';
            
            return back()->with('success', "Status project berhasil {$status}!");
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status project: ' . $e->getMessage());
        }
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Project $project)
    {
        try {
            $project->update(['is_featured' => !$project->is_featured]);
            
            $status = $project->is_featured ? 'ditampilkan' : 'dihilangkan';
            
            return back()->with('success', "Project berhasil {$status} dari highlight!");
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status featured: ' . $e->getMessage());
        }
    }

    /**
     * Delete specific project image
     */
    public function deleteImage(ProjectImage $image)
    {
        try {
            // Delete image file
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            $image->delete();

            return back()->with('success', 'Gambar berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus gambar: ' . $e->getMessage());
        }
    }
}