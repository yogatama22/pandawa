<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'whatsapp',
        'map_embed',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'tiktok_url',
        'youtube_url'
    ];
}