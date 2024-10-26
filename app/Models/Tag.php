<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use has factory;

    public function posts()
    {
        return $this->belongsToMany(post::class);
    }
}
