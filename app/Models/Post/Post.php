<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;
use Rinvex\Categories\Traits\Categorizable;

class Post extends Model
{
    use Metable;
    use SoftDeletes;
    use Categorizable;

    public function content()
    {
        return $this->hasOne(Content::class);
    }
}
