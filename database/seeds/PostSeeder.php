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

        $typeModel->posts()->save(new \App\Models\Post\Post([
            'title'  => '感谢您使用AirCMS系统发布管理文章',
            'status' => \App\Models\Post\PostStatus::STATUS_PUBLISH,
        ]));

        $layoutConfig = [
            [
                'type'     => 'row',
                'children' => [
                    [
                        'type'     => 'col',
                        'size'     => 'md-8',
                        'children' => [
                            ['type' => 'field', 'children' => 'content']
                        ],
                    ],
                    [
                        'type'     => 'col',
                        'size'     => 'md-4',
                        'children' => [
                            ['type' => 'field', 'children' => 'tag'],
                            ['type' => 'field', 'children' => 'keyword'],
                            ['type' => 'field', 'children' => 'description'],
                            ['type' => 'field', 'children' => 'category'],
                            ['type' => 'field', 'children' => 'status'],
                        ],
                    ],
                ],
            ],
        ];
        $typeModel->setMeta('layout', $layoutConfig);

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
                'description' => $name . ' (基础组件)',
            ]);

            $field->setMeta("configure", $configure);
        });

        collect($this->customFields())->each(function ($field) {

            $typeField = collect($field)->only(['name', 'slug', 'type', 'description'])->all();
            $fieldModel = \App\Models\Post\Type\Field::create($typeField);
            $fieldModel->setMeta("configure", $field['configure']);
        });
    }

    private function customFields()
    {
        return [
            [
                'name'      => '关键字', 'slug' => 'keyword', 'type' => 'input', 'description' => '',
                'configure' => [
                    'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
                    'label'   => ['attributes' => []],
                    'input'   => [
                        'attributes' => ['class' => 'form-control'],
                    ],
                ],
            ],
            [
                'name'      => '描述', 'slug' => 'description', 'type' => 'textarea', 'description' => '',
                'configure' => [
                    'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
                    'label'   => ['attributes' => []],
                    'input'   => [
                        'attributes' => ['class' => 'form-control'],
                    ],
                ],
            ],
            [
                'name'      => '分类', 'slug' => 'category', 'type' => 'category', 'description' => '',
                'configure' => [
                    'wrapper' => ['all' => ['class' => 'form-group'], 'input' => ['class'=>'border p-2','style'=>'border-color: #e4e7ea!important;font-size: 1rem;']],
                    'label'   => ['attributes' => []],
                    'input'   => [
                        'attributes' => ['class' => 'form-check-input'],
                        'group'      => 'system-articles',
                    ],
                ],
            ],
            [
                'name'      => '文章状态', 'slug' => 'status', 'type' => 'radio_list', 'description' => '',
                'configure' => [
                    'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
                    'label'   => ['attributes' => []],
                    'input'   => [
                        'attributes' => ['class' => 'form-control'],
                        'items'      => [
                            'callback' => [\App\Models\Post\PostStatus::class, 'descriptions'],
                        ]
                    ],
                ],
            ],
            [
                'name'      => '内容', 'slug' => 'content', 'type' => 'ueditor', 'description' => '',
                'configure' => [
                    'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
                    'label'   => false,
                    'input'   => [],
                ],
            ],

        ];

    }
}
