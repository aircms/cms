@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.post.type.store'))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.post.type.management')

                        <small class="text-muted">
                            @lang('labels.backend.post.type.create')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">

                    {{-- name  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.type.name'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('name')->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- slug  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.type.slug'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('slug')->class('form-control')->attribute('maxlength', 190) }}
                        </div><!--col-->
                    </div><!--form-group-->


                    {{-- description  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.type.description'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->textarea('description')->class('form-control')->attribute('maxlength', 190) }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    {{ form_submit(__('buttons.general.crud.create'))->class('mr-2') }}
                    {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                </div>
            </div>
        </div><!--card-footer-->


    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
