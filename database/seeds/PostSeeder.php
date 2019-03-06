<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateMultiple([
            'post_types',
            'post_layouts',
            'post_fields',
            'posts',
        ]);

        /** @var \App\Models\Post\Type\Type $typeModel */
        $typeModel = \App\Models\Post\Type\Type::create([
            'name' => '默认文章',
        ]);

        $typeModel->layout()->save(new \App\Models\Post\Type\Layout(['layout' => 'default']));

        $typeModel->posts()->save(new \App\Models\Post\Post([
            'title'  => '感谢您使用AirCMS系统发布管理文章',
            'status' => \App\Models\Post\PostStatus::STATUS_PUBLISH,
        ]));

        $types = \App\Models\Post\Type\Fields::all();
        collect($types)->each(function ($name, $field) {
            $configure = config('post.fields.' . $field);
            if (!$configure) {
                return;
            }

            \Illuminate\Support\Arr::forget($configure, 'input.items.attention');
            \Illuminate\Support\Arr::forget($configure, 'input.items.callback');
            \Illuminate\Support\Arr::forget($configure, 'input.items.params');

            $field = \App\Models\Post\Type\Field::create([
                'name'        => $name,
                'slug'        => $field,
                'type'        => $field,
                'description' => $name . ' 组件',
            ]);

            $field->setMeta("configure", $configure);
        });
    }
}
