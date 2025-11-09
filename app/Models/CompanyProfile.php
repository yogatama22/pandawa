<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'tagline',
        'description',
        'logo',
        'favicon',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
