<div>
        @include('includes.post.field.input',[
            'label'=>[
                'name'=>'Content',
            ],
            'input'=>[
                'name'=>'abc',
                'value'=>'abcdef',
                'attributes'=>[
                    'class'=>'form-control',
                    'required'=>true,
                ],
            ],
            'wrapper'=>[
                'all'=>[
                    'class'=>'form-group'
                ],
                'input'=>[]
            ]
        ])
</div>


<div class="row mt-4">
    <div class="col">
        @include('includes.post.field.ueditor',[
            'label'=> false,
            'input'=>[
                'name'=>'abc-3',
                'value'=>'abcdef',
                'attributes'=>[
                    'required'=>true,
                    'rows'=>10,
                    'styles'=>'min-height: 500px',
                ],
            ],
            'wrapper'=>[
                'all'=>[
                    'class'=>'form-group'
                ],
                'input'=>[]
            ]
        ])
    </div>
</div>

