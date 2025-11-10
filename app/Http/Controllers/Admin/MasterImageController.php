<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterImage;
use Illuminate\Support\Facades\Storage;

class MasterImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category = $request->get('category');
        
        $images = MasterImage::when($category, function($query) use ($category) {
            return $query->where('category', $category);
        })->latest()->paginate(20);

        $categories = MasterImage::distinct()->pluck('category');

        return view('admin.master-images.index', compact('images', 'categories'));
    }

    public function create()
    {
        $categories = MasterImage::distinct()->pluck('category');
        return view('admin.master-images.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('master-images', 'public');
        }

        MasterImage::create($validated);

        return redirect()->route('admin.master-images.index')
            ->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function show(MasterImage $masterImage)
    {
        return view('admin.master-images.show', compact('masterImage'));
    }

    public function edit(MasterImage $masterImage)
    {
        $categories = MasterImage::distinct()->pluck('category');
        return view('admin.master-images.edit', compact('masterImage', 'categories'));
    }

    public function update(Request $request, MasterImage $masterImage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($masterImage->image) {
                Storage::disk('public')->delete($masterImage->image);
            }
            $validated['image'] = $request->file('image')->store('master-images', 'public');
        }

        $masterImage->update($validated);

        return redirect()->route('admin.master-images.index')
            ->with('success', 'Gambar berhasil diupdate!');
    }

    public function destroy(MasterImage $masterImage)
    {
        // Hapus gambar
        if ($masterImage->image) {
            Storage::disk('public')->delete($masterImage->image);
        }

        $masterImage->delete();

        return redirect()->route('admin.master-images.index')
            ->with('success', 'Gambar berhasil dihapus!');
    }
}