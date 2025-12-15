<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MasterImageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\CompanySettingsController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ClientController;

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
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('company-settings', [CompanySettingsController::class, 'index'])->name('company-settings.index');
    Route::get('company-settings/edit', [CompanySettingsController::class, 'edit'])->name('company-settings.edit');
    Route::put('company-settings/profile', [CompanySettingsController::class, 'updateProfile'])->name('company-settings.update-profile');
    Route::put('company-settings/about', [CompanySettingsController::class, 'updateAbout'])->name('company-settings.update-about');


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
    Route::resource('contact-info', ContactInfoController::class);
    Route::post('contact-info/{contact}/toggle', [ContactInfoController::class, 'toggle'])->name('contact-info.toggle');

    // Contact Messages
    Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::post('contact-messages/{contactMessage}/reply', [ContactMessageController::class, 'reply'])->name('contact-messages.reply');
    Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    Route::post('contact-messages/{contactMessage}/mark-read', [ContactMessageController::class, 'markAsRead'])->name('contact-messages.mark-read');
    Route::post('contact-messages/{contactMessage}/mark-unread', [ContactMessageController::class, 'markAsUnread'])->name('contact-messages.mark-unread');


    // Clients
    Route::resource('clients', ClientController::class);
    Route::post('clients/{client}/toggle', [ClientController::class, 'toggle'])->name('clients.toggle');

});