@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.page.update',$page->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        页面模板

                        <small class="text-muted">
                            编辑
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                <div class="form-group col">
                    {{ html()->label('名称')->for('name') }}
                    {{ html()->text('name',$page->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                <div class="form-group col">
                    {{ html()->label('别名')->for('slug') }}
                    {{ html()->text('slug',$page->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            <div class="form-group">
                {{ html()->label('描述')->for('description') }}
                {{ html()->textarea('description',$page->slug)->class('form-control')->attribute('maxlength', 190) }}
            </div>


            <div class="form-group">
                {{ html()->label('布局')->for('code') }}
                {{ html()->textarea('code',$page->code)->class('form-control') }}
            </div>

        </div>

        <div class="card-footer">
            {{ form_submit('编辑')->class('mr-2') }}
        </div>

    </div>
    {{ html()->form()->close() }}
@endsection

@include('backend.includes.components.yaml',['component'=>'code'])

