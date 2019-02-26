<?php

namespace App\Models\Post\Type;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use HasSlug;

    protected $table = 'post_types';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')
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

    public function layout()
    {
        return $this->hasOne(Layout::class);
    }
}
