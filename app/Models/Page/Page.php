<?php

namespace App\Models\Page;

use App\Models\YAML2Blade\Parser;
use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model implements Sortable
{
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
        return file_get_contents(storage_path('resource/default.page.yaml'));
    }

    public static function exists($slug)
    {
        $filepath = (new static(['slug' => $slug]))->filepath();

        return is_file($filepath);
    }

    public function filepath()
    {
        return storage_path("views/frontend/{$this->slug}");
    }
    public static function generateAll()
    {
        static::all()->each(function (Page $item) {
            Parser::parse2File($item->code, $item->filepath());
        });
    }
}
