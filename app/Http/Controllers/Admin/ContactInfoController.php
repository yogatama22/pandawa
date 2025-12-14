<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contact = ContactInfo::first();
        return view('admin.contact-info.index', compact('contact'));
    }

    public function edit()
    {
        $contact = ContactInfo::firstOrCreate([]);
        return view('admin.contact-info.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'map_embed' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
        ]);

        $contact = ContactInfo::firstOrCreate([]);
        $contact->update($validated);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Contact Info berhasil diupdate!');
    }
}