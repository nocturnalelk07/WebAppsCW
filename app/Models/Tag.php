<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use has factory;

    public function post() 
    {
        return $table->belongsTo(Post::class);
    }
}
