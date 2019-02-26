<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
