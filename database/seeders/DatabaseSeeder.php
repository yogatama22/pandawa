<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Menu;
use App\Models\CompanyProfile;
use App\Models\ContactInfo;
use App\Models\About;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'password' => Hash::make('password'),
        ]);

        // Create Menus
        Menu::create([
            'name' => 'Home',
            'url' => '/',
            'parent_id' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'About',
            'url' => '/about',
            'parent_id' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Services',
            'url' => '/services',
            'parent_id' => null,
            'order' => 3,
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Contact',
            'url' => '/contact',
            'parent_id' => null,
            'order' => 4,
            'is_active' => true,
        ]);

        // Create Company Profile
        CompanyProfile::create([
            'company_name' => 'Your Company Name',
            'tagline' => 'Your Company Tagline',
            'description' => 'Your company description goes here. This is a brief introduction about your company.',
            'logo' => null,
            'favicon' => null,
            'meta_title' => 'Your Company Name - Professional Services',
            'meta_description' => 'We provide professional services for your business needs.',
            'meta_keywords' => 'company, services, professional',
        ]);

        // Create Contact Info
        ContactInfo::create([
            'address' => 'Jl. Example No. 123, Jakarta, Indonesia',
            'phone' => '+62 21 1234 5678',
            'email' => 'info@company.com',
            'whatsapp' => '+62812345678',
            'map_embed' => null,
            'facebook_url' => 'https://facebook.com/yourcompany',
            'instagram_url' => 'https://instagram.com/yourcompany',
            'twitter_url' => 'https://twitter.com/yourcompany',
            'linkedin_url' => 'https://linkedin.com/company/yourcompany',
        ]);

        // Create About
        About::create([
            'title' => 'About Our Company',
            'description' => 'We are a leading company in our industry, providing exceptional services to our clients since 2020. Our team of professionals is dedicated to delivering high-quality solutions.',
            'image' => null,
            'mission' => 'To provide innovative solutions that help our clients achieve their business goals.',
            'vision' => 'To be the most trusted partner for businesses seeking professional services.',
        ]);
    }
}