@extends('backend.layouts.app')

@section('content')
    @if ($ancestor->id == $parent->id)
        {{ html()->form('POST', route('admin.category.children.store',$parent->id))->class('form-horizontal')->open() }}
    @else
        {{ html()->form('POST', route('admin.category.children.store.child',[$ancestor->id,$parent->id]))->class('form-horizontal')->open() }}
    @endif
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $parent->name }}

                        <small class="text-muted">
                            @lang('labels.backend.category.children.create_child')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">

                    {{-- name  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.category.children.name'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('name')->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- slug  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.category.children.slug'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('slug')->class('form-control')->attribute('maxlength', 190) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- description  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.category.children.description'))->class('col-md-2 form-control-label')->for('description') }}
                        <div class="col-md-10">
                            {{ html()->textarea('description')->class('form-control')->attribute('rows', 5) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- layout  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.category.children.layout'))->class('col-md-2 form-control-label')->for('layout') }}
                        <div class="col-md-10">
                            {{ html()->text('layout')->class('form-control') }}
                        </div>
                    </div>

                    {{-- link  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.category.children.link'))->class('col-md-2 form-control-label')->for('link') }}
                        <div class="col-md-5">
                            {{ html()->text('link')->class('form-control') }}
                        </div>
                        <div class="col-md-5">
                            {{ html()->select('link_mode', \App\Models\LinkModes::all())->class('form-control') }}
                        </div>
                    </div>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    {{ form_submit(__('buttons.general.crud.create'))->class('mr-2') }}
                </div>
            </div>
        </div><!--card-footer-->


    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
