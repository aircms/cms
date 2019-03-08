@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.fragment.store'))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.fragment.management')

                        <small class="text-muted">
                            @lang('labels.general.create')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                {{-- name  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.name'))->class('form-control-label')->for('name') }}
                    {{ html()->text('name')->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                {{-- slug  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.slug'))->class('form-control-label')->for('slug') }}
                    {{ html()->text('slug')->class('form-control')->attribute('maxlength', 190) }}
                </div>

                {{-- tags  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.tag'))->class('form-control-label')->for('tag') }}
                    {{ html()->text('tag')->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            {{-- description  --}}
            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.fragment.description'))->class('form-control-label')->for('description') }}
                {{ html()->textarea('description')->class('form-control') }}
            </div>

            {{-- code  --}}
            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.fragment.code'))->class('form-control-label')->for('code') }}
                {{ html()->textarea('code',(new \App\Models\Page\Fragment())->default_code)->class('form-control') }}
            </div>
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

@include('backend.includes.components.yaml',['component'=>'code'])
