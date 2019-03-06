@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.post.layout.store',$type->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body border-bottom">
            <h4 class="card-title mb-0">
                @lang('labels.backend.post.layout.management')
            </h4>
        </div>
        <div class="card-body">
            <div>
                <textarea class="hide" name="layout" id="layout">{{ $layout }}</textarea>
            </div>

            <div class="text-muted">
                语法格式： YAML， 使用教程：<a href="http://www.ruanyifeng.com/blog/2016/07/yaml.html" target="_blank">YAML
                    语言教程</a>
            </div>
        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.save'))->class('mr-2') }}
        </div>

    </div><!--card-->
    {{ html()->form()->close() }}

@endsection

@include('backend.includes.components.yaml',['component'=>'layout'])

