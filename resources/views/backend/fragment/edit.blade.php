@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.fragment.update',$fragment))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.fragment.management')

                        <small class="text-muted">
                            @lang('labels.general.update')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                {{-- name  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.name'))->class('form-control-label')->for('name') }}
                    {{ html()->text('name',$fragment->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                {{-- slug  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.slug'))->class('form-control-label')->for('slug') }}
                    {{ html()->text('slug',$fragment->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>

                {{-- tags  --}}
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.fragment.tag'))->class('form-control-label')->for('tag') }}
                    {{ html()->text('tag',implode(",",$fragment->tags->pluck('name')->all()))->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            {{-- description  --}}
            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.fragment.description'))->class('form-control-label')->for('description') }}
                {{ html()->textarea('description',$fragment->description)->class('form-control') }}
            </div>

            {{-- code  --}}
            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.fragment.code'))->class('form-control-label')->for('code') }}
                {{ html()->textarea('code',$fragment->code)->class('form-control') }}
            </div>
        </div><!--card-body-->

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.edit'))->class('mr-2') }}
        </div><!--card-footer-->


    </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@include('backend.includes.components.yaml',['component'=>'code'])

