<?php

namespace App\Models;

class Category extends \Rinvex\Categories\Models\Category
{
    public function depthPrefix($char = "┇┄", $ignoreRoot = true)
    {
        return str_repeat($char, ($this->depth - 1)) . ' ';
    }

    public function flatIndentMap($char = '┇┄')
    {
        return $this->descendants()->defaultOrder()->withDepth()->get()->flatMap(function (Category $category) use ($char) {
            return [
                $category->id => $category->depthPrefix($char) . $category->name,
            ];
        })->all();
    }
}
