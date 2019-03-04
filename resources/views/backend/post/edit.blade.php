@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.post.update',[$type->id,$post->id]))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.post.title'))->for('title') }}
                {{ html()->text('title')->value($post->title)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
            </div>

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.post.slug'))->for('name') }}
                {{ html()->text('slug')->value($post->slug)->class('form-control')->attribute('maxlength', 190) }}
            </div>

            @include('includes.post.layout.'.$type->layout->layout,['post'=>$post])
        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.update'))->class('mr-2') }}
        </div>


    </div>
    {{ html()->form()->close() }}
@endsection
