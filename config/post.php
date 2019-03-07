<?php

return [
    'fields' => [
        'tag'           => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['attributes' => []],
            'input'   => [
                'attributes' => ['class' => 'form-control'],
                'value'      => []
            ],
        ],
        'categories'      => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['attributes' => []],
            'input'   => [
                'group'      => 'system-articles',
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'checkbox'      => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => ['class' => 'form-check']],
            'label'   => ['attributes' => []],
            'input'   => [
                'value'      => 'OK',
                'checked'    => true,
                'attributes' => ['class' => 'form-check-input'],
            ],
        ],
        'select_multi'  => [
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'label'   => ['attributes' => []],
            'input'   => [
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
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
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
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
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
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
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
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
        ],
        'textarea'      => [
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
        ],

        'ueditor' => [
            'label'   => ['attributes' => []],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []],
            'input'   => [
                'value'      => 'default content',
                'attributes' => ['required' => true, 'rows' => 10, 'tabIndex' => -1],
            ],
        ],
    ]

];
