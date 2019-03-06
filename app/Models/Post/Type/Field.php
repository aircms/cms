<?php

namespace App\Models\Post\Type;

use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Field extends Model implements Sortable
{
    use HasSlug;
    use SortableTrait;
    use Metable;

    protected $table = 'post_fields';

    protected $fillable = ['name', 'slug', 'description', 'order', 'type'];

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
