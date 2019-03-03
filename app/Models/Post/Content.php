<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table    = 'post_contents';
    protected $fillable = ['content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
