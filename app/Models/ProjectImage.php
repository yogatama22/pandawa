<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image_path',
        'caption',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    // Relationship
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}