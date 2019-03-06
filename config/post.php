<?php

return [
    'fields' => [
        'tag'           => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['name' => 'Tags'],
            'input'   => [
                'name'       => 'tags',
                'attributes' => ['class' => 'form-control'],
                'value'      => ['aaa', 'bbbb', 'cccc']
            ],
        ],
        'category'      => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['name' => 'Category'],
            'input'   => [
                'name'       => 'category',
                'group'      => 'systematic-articles',
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'checkbox'      => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => ['class' => 'form-check']],
            'label'   => ['name' => 'Can'],
            'input'   => [
                'name'       => 'can',
                'value'      => 'OK',
                'checked'    => true,
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'select_multi'  => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['name' => 'CheckBoxList'],
            'input'   => [
                'name'       => 'checkbox_list',
                'value'      => ['a', 'b'],
                'items'      => [
                    'a'         => 'AStatus',
                    'b'         => 'BStatus',
                    'c'         => 'CStatus',
                    'attention' => '---------上面的配置优先权重----------',
                    'callback'  => [\App\Models\Post\Post::class, 'run'],
                    'params'    => ['BStatus'],
                ],
                'attributes' => ['class' => 'form-control']
            ],
        ],
        'select'        => [
            'label'   => ['name' => 'select'],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'select',
                'value'      => 'c',
                'items'      => [
                    'a'         => 'AStatus',
                    'b'         => 'AStatus',
                    'c'         => 'CStatus',
                    'd'         => 'DStatus',
                    'attention' => '---------上面的配置优先权重----------',
                    'callback'  => [\App\Models\Post\Post::class, 'run'],
                    'params'    => ['BStatus'],
                ],
                'attributes' => ['class' => 'form-control'],
            ],
        ],
        'radio'         => [
            'label'   => ['name' => 'Radio'],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'radio',
                'inline'     => true,
                'value'      => 'a',
                'items'      => [
                    'a'         => 'AStatus',
                    'b'         => 'AStatus',
                    'c'         => 'CStatus',
                    'd'         => 'DStatus',
                    'attention' => '---------上面的配置优先权重----------',
                    'callback'  => [\App\Models\Post\Post::class, 'run'],
                    'params'    => ['BStatus'],
                ],
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'checkbox_list' => [
            'label'   => ['name' => 'Items'],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'items',
                'inline'     => true,
                'value'      => ['a', 'c'],
                'items'      => [
                    'a'         => 'AAAA',
                    'b'         => 'BBBB',
                    'c'         => 'CCCC',
                    'd'         => 'DDDD',
                    'attention' => '---------上面的配置优先权重----------',
                    'callback'  => [\App\Models\Post\Post::class, 'run'],
                    'params'    => ['BStatus'],
                ],
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'input'         => [
            'label'   => ['name' => 'Input',],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'input',
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
        ],
        'textarea'      => [
            'label'   => ['name' => 'Textarea',],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'textarea',
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
        ],

        'ueditor' => [
            'label'   => false,
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'name'       => 'content',
                'value'      => 'default content',
                'attributes' => ['required' => true, 'rows' => 10, 'tabIndex' => -1],
            ],
        ],
    ]

];
