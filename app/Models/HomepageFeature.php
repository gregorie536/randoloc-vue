<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageFeature extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'location', 'feature_date'];
}
