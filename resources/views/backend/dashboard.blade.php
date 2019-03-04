@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}


                    @include('includes.post.field.input',[
                        'label'=>[
                            'name'=>'TestLabel',
                            'attributes'=>[
                                'class'=>'col-md-2 form-control-label',
                                'for'=>'abc',
                            ],
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
                                'class'=>'form-group row'
                            ],
                            'input'=>[
                                'class'=>'col-md-10'
                            ]
                        ]
                    ])
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
