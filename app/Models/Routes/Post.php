<?php

namespace App\Models\Routes;

use App\Models\Post\Post as PostModel;

class Post extends PostModel
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
