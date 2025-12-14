<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $messages = $query->latest()->paginate(20);
        $unreadCount = ContactMessage::unread()->count();

        return view('admin.contact-messages.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Mark as read if unread
        if ($contactMessage->status === 'unread') {
            $contactMessage->update(['status' => 'read']);
        }

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'reply' => 'required|string',
        ]);

        $contactMessage->update([
            'reply' => $validated['reply'],
            'status' => 'replied',
            'replied_at' => now(),
        ]);

        // TODO: Send email notification to user
        // You can implement email sending here

        return redirect()->route('admin.contact-messages.show', $contactMessage)
            ->with('success', 'Balasan berhasil disimpan!');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['status' => 'read']);

        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca!');
    }

    public function markAsUnread(ContactMessage $contactMessage)
    {
        $contactMessage->update(['status' => 'unread']);

        return back()->with('success', 'Pesan ditandai sebagai belum dibaca!');
    }
}