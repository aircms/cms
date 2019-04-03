@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.pages.fragment.update',$fragment))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        页面组件

                        <small class="text-muted">
                            编辑
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                {{-- name  --}}
                <div class="form-group col">
                    {{ html()->label('名称')->class('form-control-label')->for('name') }}
                    {{ html()->text('name',$fragment->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                </div>

                {{-- slug  --}}
                <div class="form-group col">
                    {{ html()->label('别名')->class('form-control-label')->for('slug') }}
                    {{ html()->text('slug',$fragment->slug)->class('form-control')->attribute('maxlength', 190) }}
                </div>

                {{-- tags  --}}
                <div class="form-group col">
                    {{ html()->label('标签')->class('form-control-label')->for('tag') }}
                    {{ html()->text('tag',implode(",",$fragment->tags->pluck('name')->all()))->class('form-control')->attribute('maxlength', 190) }}
                </div>
            </div>

            {{-- description  --}}
            <div class="form-group">
                {{ html()->label('描述')->class('form-control-label')->for('description') }}
                {{ html()->textarea('description',$fragment->description)->class('form-control') }}
            </div>

            {{-- code  --}}
            <div class="form-group">
                {{ html()->label('布局')->class('form-control-label')->for('code') }}
                {{ html()->textarea('code',$fragment->code)->class('form-control') }}
            </div>
        </div><!--card-body-->

        <div class="card-footer">
            {{ form_submit('编辑')->class('mr-2') }}
        </div><!--card-footer-->


    </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@include('backend.includes.components.yaml',['component'=>'code'])

