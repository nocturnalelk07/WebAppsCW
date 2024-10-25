<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class);
    }
}
