<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Judul slider wajib diisi.',
            'title.max' => 'Judul slider maksimal 255 karakter.',
            'image.required' => 'Gambar slider wajib diupload.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'button_link.url' => 'Link button harus berupa URL yang valid.',
            'order.required' => 'Urutan slider wajib diisi.',
            'order.integer' => 'Urutan harus berupa angka.',
            'order.min' => 'Urutan tidak boleh kurang dari 0.',
        ]);

        // Set default value for is_active if not provided
        $validated['is_active'] = $request->has('is_active') ? $request->is_active : true;

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Judul slider wajib diisi.',
            'title.max' => 'Judul slider maksimal 255 karakter.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'button_link.url' => 'Link button harus berupa URL yang valid.',
            'order.required' => 'Urutan slider wajib diisi.',
            'order.integer' => 'Urutan harus berupa angka.',
            'order.min' => 'Urutan tidak boleh kurang dari 0.',
        ]);

        // Set default value for is_active if not provided
        $validated['is_active'] = $request->has('is_active') ? $request->is_active : $slider->is_active;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            // Delete image from storage
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $slider->delete();

            return redirect()->route('admin.sliders.index')
                ->with('success', 'Slider berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.sliders.index')
                ->with('error', 'Gagal menghapus slider: ' . $e->getMessage());
        }
    }

    /**
     * Toggle the active status of the slider.
     */
    public function toggle(Slider $slider)
    {
        try {
            $slider->update(['is_active' => !$slider->is_active]);

            $status = $slider->is_active ? 'diaktifkan' : 'dinonaktifkan';

            return back()->with('success', "Status slider berhasil {$status}!");
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengubah status slider: ' . $e->getMessage());
        }
    }
}