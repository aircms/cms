@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.page.update',$page->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.page.management')

                        <small class="text-muted">
                            @lang('labels.general.update')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.page.name'))->for('name') }}
                    {{ html()->text('name',$page->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.page.slug'))->for('slug') }}
                    {{ html()->text('slug',$page->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>

                <div class="form-group col">
                    {{ html()->label(__('validation.attributes.backend.page.layout'))->for('layout') }}
                    {{ html()->text('layout',$page->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.page.description'))->for('description') }}
                {{ html()->textarea('description',$page->slug)->class('form-control')->attribute('maxlength', 190) }}
            </div>


            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.page.code'))->for('code') }}
                {{ html()->textarea('code',$page->code)->class('form-control') }}
            </div>

        </div>

        <div class="card-footer">
            {{ form_submit(__('buttons.general.crud.edit'))->class('mr-2') }}
        </div>

    </div>
    {{ html()->form()->close() }}
@endsection

@include('backend.includes.components.yaml',['component'=>'code'])

