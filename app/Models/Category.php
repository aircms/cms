<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Category extends \Rinvex\Categories\Models\Category
{
    public function scopeRoots(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function depthPrefix($char = "--", $ignoreRoot = true)
    {
        if ($this->depth == 1) {
            return "";
        }

        return "|-".str_repeat($char, 2 * ($this->depth - 1)) . ' ';
    }
}
