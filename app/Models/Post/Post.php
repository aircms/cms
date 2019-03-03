<?php

namespace App\Models\Post;

use App\Models\Post\Type\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use Metable;
    use HasSlug;
    use SoftDeletes;
    use Categorizable;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->saveSlugsTo('slug')->generateSlugsFrom('title');
    }

    public function content()
    {
        return $this->hasOne(Content::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
