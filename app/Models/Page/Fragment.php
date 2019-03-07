<?php

namespace App\Models\Page;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Fragment extends Model
{
    use Taggable;
    use Metable;
    use HasSlug;
    use SortableTrait;

    protected $fillable = ['name', 'slug', 'description', 'order', 'code'];

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

    public function getDefaultCodeAttribute()
    {
        return file_get_contents(storage_path("app/default.fragment.yaml"));
    }
}
