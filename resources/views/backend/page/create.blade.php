@extends('backend.layouts.app')

@push('after-styles')
    @include('vendor.ueditor.assets')
@endpush

@section('content')
    {{ html()->form('POST', route('admin.post.store',$type->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $type->name }}

                        <small class="text-muted">
                            @lang('labels.general.create')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.post.title'))->for('title') }}
                {{ html()->text('title')->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
            </div>

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.post.slug'))->for('name') }}
                {{ html()->text('slug')->class('form-control')->attribute('maxlength', 190) }}
            </div>

            @foreach($type->getMeta('layout', []) as $element)
                @include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children'], 'post'=>null])
            @endforeach
        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.create'))->class('mr-2') }}
        </div>


    </div>
    {{ html()->form()->close() }}
@endsection
