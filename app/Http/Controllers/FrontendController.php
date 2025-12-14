<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Service;
use App\Models\About;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\CompanyProfile;
use App\Models\ContactInfo;
use App\Models\Project;

class FrontendController extends Controller
{
    /**
     * Tampilkan halaman home
     */
    public function index()
    {
        $company = CompanyProfile::first();
        $sliders = Slider::active()->orderBy('order')->get();
        $menus = Menu::active()->with('children')->get();
        $services = Service::active()->take(6)->get();
        $about = About::first();
        $testimonials = Testimonial::active()->take(3)->get();
        $team = TeamMember::active()->take(4)->get();
        $contact = ContactInfo::first();
        $featuredProjects = Project::featured()->take(6)->get();

        return view('frontend.index', compact(
            'company',
            'sliders',
            'menus',
            'services',
            'about',
            'testimonials',
            'team',
            'contact',
            'featuredProjects'
        ));
    }

    /**
     * Tampilkan halaman about
     */
    public function about()
    {
        $company = CompanyProfile::first();
        $menus = Menu::active()->with('children')->get();
        $about = About::first();
        $team = TeamMember::active()->get();
        $contact = ContactInfo::first();

        return view('frontend.about', compact('company', 'menus', 'about', 'team', 'contact'));
    }

    /**
     * Tampilkan halaman services
     */
    public function services()
    {
        $company = CompanyProfile::first();
        $menus = Menu::active()->with('children')->get();
        $services = Service::active()->get();
        $contact = ContactInfo::first();

        return view('frontend.services', compact('company', 'menus', 'services', 'contact'));
    }

    /**
     * Tampilkan halaman contact
     */
    public function contact()
    {
        $company = CompanyProfile::first();
        $menus = Menu::active()->with('children')->get();
        $contact = ContactInfo::first();

        return view('frontend.contact', compact('company', 'menus', 'contact'));
    }

    /**
     * Tampilkan halaman projects list
     */
    public function projects(Request $request)
    {
        $company = CompanyProfile::first();
        $menus = Menu::active()->with('children')->get();
        $contact = ContactInfo::first();

        $query = Project::active();

        // Filter by category if provided
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $projects = $query->orderBy('order')->get();
        $categories = Project::active()->distinct()->pluck('category');

        return view('frontend.projects', compact('company', 'menus', 'contact', 'projects', 'categories'));
    }

    /**
     * Tampilkan detail project
     */
    public function projectDetail(Project $project)
    {
        // Check if project is active
        if (!$project->is_active) {
            abort(404);
        }

        $company = CompanyProfile::first();
        $menus = Menu::active()->with('children')->get();
        $contact = ContactInfo::first();

        // Load project images
        $project->load('images');

        // Get related projects (same category, exclude current)
        $relatedProjects = Project::active()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('frontend.project-detail', compact('company', 'menus', 'contact', 'project', 'relatedProjects'));
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke database atau kirim email
        // TODO: Implement contact form handler

        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}