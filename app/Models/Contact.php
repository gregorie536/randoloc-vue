<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'type'];

    protected function formatPhoneNumber($number)
    {
        return preg_replace('/(\d{2})(?=\d)/', '$1 ', $number);
    }

    public function getFormattedPhoneNumberAttribute()
    {
        return $this->formatPhoneNumber($this->phone_number);
    }

    
}
