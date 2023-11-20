<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'image',
        'location',
        'supervisor',
        'day',
        'date',
        'number_km',
        'active',
        'category_id',
        'user_id'
    ];
}
