<?php

namespace App\Models;

class Category extends \Rinvex\Categories\Models\Category
{
    public function scopeRoot($query)
    {
        $query->where('parent_id', null);
    }
}
