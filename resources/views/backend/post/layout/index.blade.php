@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.post.layout.store',[$type->id,$layout->id]))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.post.layout.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.post.layout.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <h1>Layout</h1>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
