<?php

namespace App\Models\Post\Type;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model implements Sortable
{
    use HasSlug;
    use SortableTrait;
    use Metable;

    protected $table    = 'post_types';
    protected $fillable = ['name', 'slug', 'description', 'order'];

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

    public static function types()
    {
        return collect(self::all())->mapWithKeys(function (Type $item) {
            return [$item->id => $item->name];
        })->all();
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
