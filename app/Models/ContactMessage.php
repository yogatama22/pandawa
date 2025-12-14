<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'reply',
        'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Accessor
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'unread' => 'bg-warning',
            'read' => 'bg-info',
            'replied' => 'bg-success',
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'unread' => 'Belum Dibaca',
            'read' => 'Sudah Dibaca',
            'replied' => 'Sudah Dibalas',
        ];

        return $labels[$this->status] ?? 'Unknown';
    }
}