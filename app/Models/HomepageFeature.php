<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Add this line

class HomepageFeature extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'location', 'feature_date'];

    // Dans votre modèle HomepageFeature
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}
