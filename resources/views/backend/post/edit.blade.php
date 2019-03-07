@extends('backend.layouts.app')

@push('after-styles')
    @include('vendor.ueditor.assets')
@endpush

@section('content')
    {{ html()->form('POST', route('admin.post.update',[$type->id,$post->id]))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col form-group">
                    {{ html()->label(__('validation.attributes.backend.post.title'))->for('title') }}
                    {{ html()->text('title',$post->title)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.post.slug'))->for('name') }}
                    {{ html()->text('slug',$post->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            {{--@include('includes.post.layout.'.$type->layout->layout,['post'=>$post])--}}

            @foreach($type->getMeta('layout', []) as $element)
                @include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children'], 'post'=>$post])
            @endforeach
        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.update'))->class('mr-2') }}
        </div>


    </div>
    {{ html()->form()->close() }}
@endsection
