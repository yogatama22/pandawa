<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class CompanySettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display company settings (combined view)
     */
    public function index()
    {
        $company = CompanyProfile::first();
        $about = About::first();
        
        return view('admin.company-settings.index', compact('company', 'about'));
    }

    /**
     * Show the form for editing company settings
     */
    public function edit()
    {
        $company = CompanyProfile::firstOrCreate([]);
        $about = About::firstOrCreate([]);
        
        return view('admin.company-settings.edit', compact('company', 'about'));
    }

    /**
     * Update company profile information
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:1024',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $company = CompanyProfile::firstOrCreate([]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('company', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($company->favicon) {
                Storage::disk('public')->delete($company->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('company', 'public');
        }

        $company->update($validated);

        return redirect()->route('admin.company-settings.index')
            ->with('success', 'Company Profile berhasil diupdate!');
    }

    /**
     * Update about information
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
        ]);

        $about = About::firstOrCreate([]);

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($validated);

        return redirect()->route('admin.company-settings.index')
            ->with('success', 'About Information berhasil diupdate!');
    }
}