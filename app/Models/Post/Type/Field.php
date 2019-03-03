<?php

namespace App\Models\Post\Type;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Field extends Model implements Sortable
{
    use HasSlug;
    use SortableTrait;

    protected $table = 'post_fields';

    protected $fillable = ['name', 'slug', 'description', 'order'];

    public $sortable = [
        'order_column_name' => 'order',
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
