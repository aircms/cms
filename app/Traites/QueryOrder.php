<?php

namespace App\Traites;


trait QueryOrder
{
    public function scopeOrderDesc($query, $field = 'id')
    {
        return $query->orderBy($field, 'desc');
    }

    public function scopeOrderAsc($query, $field = 'id')
    {
        return $query->orderBy($field, 'asc');
    }
}
