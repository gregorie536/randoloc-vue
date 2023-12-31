<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function updateMembers(array $memberIds)
    {
        $this->members()->detach();

        foreach ($memberIds as $memberId) {
            $this->members()->attach($memberId);
        }
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'committee_members', 'committee_id', 'member_id');
    }
}
