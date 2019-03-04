<?php

return [
    'includes' => [
        'vendor.ueditor.assets',
    ],
    'fields'   => [
        'can'         => [
            'label'   => ['name' => 'Can'],
            'input'   => [
                'name'       => 'can',
                'value'      => 'OK',
                'checked'    => true,
                'attributes' => ['class' => 'form-check-input'],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => ['class' => 'form-check']
            ]
        ],
        'status'      => [
            'label'   => ['name' => 'Status'],
            'input'   => [
                'name'       => 'status',
                'inline'     => true,
                'value'      => 'a',
                'items'      => [
                    'a' => 'AStatus',
                    'b' => 'AStatus',
                    'c' => 'CStatus',
                    'd' => 'DStatus',
                ],
                'attributes' => ['class' => 'form-check-input'],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],
        'items'       => [
            'label'   => ['name' => 'Items'],
            'input'   => [
                'name'       => 'items',
                'inline'     => true,
                'value'      => ['a', 'c'],
                'items'      => [
                    'a' => 'AAAA',
                    'b' => 'BBBB',
                    'c' => 'CCCC',
                    'd' => 'DDDD',
                ],
                'attributes' => ['class' => 'form-check-input'],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],
        'keywords'    => [
            'label'   => ['name' => 'Keywords',],
            'input'   => [
                'name'       => 'keywords',
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],
        'description' => [
            'label'   => ['name' => 'Description',],
            'input'   => [
                'name'       => 'description',
                'attributes' => ['class' => 'form-control', 'required' => true,],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],

        'content' => [
            'label'   => false,
            'input'   => [
                'name'       => 'content',
                'value'      => 'default content',
                'attributes' => ['required' => true, 'rows' => 10, 'tabIndex' => -1],
            ],
            'wrapper' => ['all' => ['class' => 'form-group'], 'input' => []]
        ],
    ]

];
