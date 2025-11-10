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

class FrontendController extends Controller
{
    /**
     * Tampilkan halaman home
     */
    public function index()
    {
        $company = CompanyProfile::first();
        $sliders = Slider::active()->get();
        $menus = Menu::active()->with('children')->get();
        $services = Service::active()->take(6)->get();
        $about = About::first();
        $testimonials = Testimonial::active()->take(3)->get();
        $team = TeamMember::active()->take(4)->get();
        $contact = ContactInfo::first();

        return view('frontend.index', compact(
            'company',
            'sliders',
            'menus',
            'services',
            'about',
            'testimonials',
            'team',
            'contact'
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