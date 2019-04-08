<?php

namespace App\Models\Routes;

use App\Models\Category as CategoryModel;

class Category extends CategoryModel
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
