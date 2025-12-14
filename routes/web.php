<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MasterImageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ProjectController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/projects/{project:slug}', [FrontendController::class, 'projectDetail'])->name('projects.detail');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('contact.submit');

// Auth Routes (Login Only)
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Redirect /home ke admin dashboard
Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
})->middleware('auth');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Company Profile
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('company-profile.index');
    Route::get('company-profile/edit', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('company-profile/update', [CompanyProfileController::class, 'update'])->name('company-profile.update');
    
    // Sliders
    Route::resource('sliders', SliderController::class);
    Route::post('sliders/{slider}/toggle', [SliderController::class, 'toggle'])->name('sliders.toggle');
    
    // Master Images
    Route::resource('master-images', MasterImageController::class);
    
    // Menus
    Route::resource('menus', MenuController::class);
    Route::post('menus/{menu}/toggle', [MenuController::class, 'toggle'])->name('menus.toggle');
    
    // Services
    Route::resource('services', ServiceController::class);
    Route::post('services/{service}/toggle', [ServiceController::class, 'toggle'])->name('services.toggle');
    
    // About
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
    
    // Projects
    Route::resource('projects', ProjectController::class);
    Route::post('projects/{project}/toggle', [ProjectController::class, 'toggle'])->name('projects.toggle');
    Route::post('projects/{project}/toggle-featured', [ProjectController::class, 'toggleFeatured'])->name('projects.toggle-featured');
    Route::delete('projects/images/{image}', [ProjectController::class, 'deleteImage'])->name('projects.delete-image');
    
    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    Route::post('testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggle'])->name('testimonials.toggle');
    
    // Team Members
    Route::resource('team-members', TeamMemberController::class);
    Route::post('team-members/{teamMember}/toggle', [TeamMemberController::class, 'toggle'])->name('team-members.toggle');
    
    // Contact Info
    Route::get('contact-info', [ContactInfoController::class, 'index'])->name('contact-info.index');
    Route::get('contact-info/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info/update', [ContactInfoController::class, 'update'])->name('contact-info.update');
});