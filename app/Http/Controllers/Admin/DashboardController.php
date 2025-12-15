<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\Client;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'sliders' => Slider::count(),
            'menus' => Menu::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'team_members' => TeamMember::count(),
            'clients' => Client::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}