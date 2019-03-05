<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class SettingItem extends Model implements Sortable
{
    use SortableTrait;
    use Categorizable;
    use Metable;
    use HasSlug;

    public $sortable = [
        'order_column_name' => 'order',
    ];


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
