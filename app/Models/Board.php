<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'role'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
