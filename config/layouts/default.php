<?php

return [
    'includes' => [
        'vendor.ueditor.assets',
    ],
    'fields'   => [
        'category'    => [
            'label'   => ['name' => 'Category-1'],
            'input'   => [
                'name'       => 'category-1',
                'group'      => 'voluptas-voluptas-aliquid-quos-illum-aut-enim-voluptas-sit',
                'attributes' => ['class' => 'form-check-input'],
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],
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
        'status-2'    => [
            'label'   => ['name' => 'Status-2'],
            'input'   => [
                'name'       => 'status-2',
                'value'      => ['a', 'b'],
                'items'      => [
                    'a' => 'AStatus',
                    'b' => 'BStatus',
                    'c' => 'CStatus',
                    'd' => 'DStatus',
                    'e' => 'EStatus',
                    'f' => 'FStatus',
                    'g' => 'GStatus',
                ],
                'attributes' => [
                    'class' => 'form-control'
                ]
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
            ]
        ],
        'status-1'    => [
            'label'   => ['name' => 'Status-1'],
            'input'   => [
                'name'       => 'status-1',
                'value'      => 'c',
                'items'      => [
                    'a' => 'AStatus',
                    'b' => 'AStatus',
                    'c' => 'CStatus',
                    'd' => 'DStatus',
                ],
                'attributes' => [
                    'class' => 'form-control'
                ]
            ],
            'wrapper' => [
                'all'   => ['class' => 'form-group'],
                'input' => []
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
