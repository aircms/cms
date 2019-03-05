<?php

namespace App\Models;

use Spatie\Sluggable\SlugOptions;

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

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->doNotGenerateSlugsOnUpdate()
            ->generateSlugsFrom(function () {
                $translate = \ShaoZeMing\LaravelTranslate\Facade\Translate::translate($this->name);
                return str_slug($translate);
            })
            ->saveSlugsTo('slug');
    }
}
