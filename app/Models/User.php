<?php

namespace App\Models;

use App\Models\Email;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    public function email()
    {
        return $this->hasOne(Email::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
