<?php

namespace App\Models\Post;

use App\Models\Post\Type\Type;
use App\Traits\QueryOrder;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;
use Rinvex\Categories\Traits\Categorizable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use Metable;
    use Taggable;
    use HasSlug;
    use SoftDeletes;
    use Categorizable;
    use QueryOrder;

    protected $fillable = ['title', 'slug', 'order', 'status'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->doNotGenerateSlugsOnUpdate()
            ->generateSlugsFrom(function () {
                $translate = \ShaoZeMing\LaravelTranslate\Facade\Translate::translate($this->title);
                return str_slug($translate);
            })
            ->saveSlugsTo('slug');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getStatusTextAttribute()
    {
        return PostStatus::description($this->status);
    }
}
