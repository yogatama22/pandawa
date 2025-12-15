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
use App\Models\ContactMessage;
use App\Models\Client;

class FrontendController extends Controller
{
    /**
     * Get shared data for all pages
     */
    protected function getSharedData()
    {
        return [
            'company' => CompanyProfile::first(),
            'menus' => Menu::active()->with('children')->get(),
            'contact' => ContactInfo::first(),
            'clients' => Client::active()->orderBy('order')->get(),
            'testimonials' => Testimonial::active()->latest()->take(3)->get()
        ];
    }

    /**
     * Tampilkan halaman home
     */
    public function index()
    {
        $data = $this->getSharedData();

        $data['sliders'] = Slider::active()->orderBy('order')->get();
        $data['services'] = Service::active()->orderBy('order')->take(6)->get();
        $data['about'] = About::first();
        $data['team'] = TeamMember::active()->orderBy('order')->take(4)->get();
        $data['featuredProjects'] = Project::featured()->orderBy('order')->take(6)->get();

        return view('frontend.index', $data);
    }

    /**
     * Tampilkan halaman about
     */
    public function about()
    {
        $data = $this->getSharedData();

        $data['about'] = About::first();
        $data['team'] = TeamMember::active()->orderBy('order')->get();

        return view('frontend.about', $data);
    }

    /**
     * Tampilkan halaman services
     */
    public function services()
    {
        $data = $this->getSharedData();

        $data['services'] = Service::active()->orderBy('order')->get();

        return view('frontend.services', $data);
    }

    /**
     * Tampilkan halaman contact
     */
    public function contact()
    {
        $data = $this->getSharedData();

        return view('frontend.contact', $data);
    }

    /**
     * Tampilkan halaman projects list
     */
    public function projects(Request $request)
    {
        $data = $this->getSharedData();

        $query = Project::active();

        // Filter by category if provided
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $data['projects'] = $query->orderBy('order')->orderBy('created_at', 'desc')->get();
        $data['categories'] = Project::active()->distinct()->pluck('category');

        return view('frontend.projects', $data);
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

        $data = $this->getSharedData();

        // Load project images
        $project->load('images');

        $data['project'] = $project;

        // Get related projects (same category, exclude current)
        $data['relatedProjects'] = Project::active()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('frontend.project-detail', $data);
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subject wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        // Save to database
        ContactMessage::create($validated);

        // TODO: Send email notification to admin
        // You can implement email notification here

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }
}