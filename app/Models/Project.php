<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'description',
        'thumbnail',
        'client_name',
        'location',
        'year',
        'project_type',
        'area',
        'duration',
        'is_featured',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'year' => 'integer',
        'area' => 'decimal:2',
        'duration' => 'integer',
        'order' => 'integer',
    ];

    // Relationships
    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                     ->where('is_active', true)
                     ->orderBy('order');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Auto generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    // Accessor for thumbnail URL
    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }
}