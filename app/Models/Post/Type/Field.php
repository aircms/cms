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

    public function configure()
    {
        $configure = $this->getMeta("configure", []);

        array_set($configure, 'label.name', $this->name);
        array_set($configure, 'input.name', $this->slug);

        $items = array_get($configure, 'input.items.callback');
        if ($items && is_callable($items)) {
            $itemParams = array_get($configure, 'input.items.params', []);
            $itemResult = call_user_func_array($items, $itemParams);
            array_set($configure, 'input.items', $itemResult);
        }

        return $configure;
    }
}
