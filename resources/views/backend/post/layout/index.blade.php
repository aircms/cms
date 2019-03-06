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
            <div class="border p-3">
                <textarea name="layout" id="layout" cols="30" rows="50">{{ $layout }}</textarea>
            </div>

            <div class="text-muted">
                语法格式： YAML， 使用教程：<a href="http://www.ruanyifeng.com/blog/2016/07/yaml.html" target="_blank">YAML
                    语言教程</a>
            </div>
        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.create'))->class('mr-2') }}
        </div>

    </div><!--card-->
    {{ html()->form()->close() }}

    {{--<div class="card-body">--}}
    {{--@foreach($layout as $element)--}}
    {{--@include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children']])--}}
    {{--@endforeach--}}
    {{--</div>--}}
@endsection

@push("after-styles")
    <link rel="stylesheet" href="{{ asset("js/codemirror-5.44.0/lib/codemirror.css") }}">
@endpush

@push('after-scripts')
    <script src="{{ asset("js/codemirror-5.44.0/lib/codemirror.js") }}"></script>
    <script src="{{ asset("js/codemirror-5.44.0/mode/yaml/yaml.js") }}"></script>
    <script>
      CodeMirror.fromTextArea(document.getElementById('layout'), {})
    </script>
@endpush
