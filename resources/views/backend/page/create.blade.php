@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.page.store'))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        页面模板

                        <small class="text-muted">
                            新建
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                <div class="form-group col">
                    {{ html()->label('名称')->for('name') }}
                    {{ html()->text('name')->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                <div class="form-group col">
                    {{ html()->label('别名')->for('slug') }}
                    {{ html()->text('slug')->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            <div class="form-group">
                {{ html()->label('描述')->for('description') }}
                {{ html()->textarea('description')->class('form-control')->attribute('maxlength', 190) }}
            </div>


            <div class="form-group">
                {{ html()->label('布局')->for('code') }}
                {{ html()->textarea('code',(new \App\Models\Page\Page())->default_code)->class('form-control') }}
            </div>

        </div>

        <div class="card-footer">
            {{ form_submit('创建')->class('mr-2') }}
        </div>

    </div>
    {{ html()->form()->close() }}
@endsection

@include('backend.includes.components.yaml',['component'=>'code'])
