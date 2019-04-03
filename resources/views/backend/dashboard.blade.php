@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . '管理仪表板')

@section('content')
    <div class="row image-list">

        <div class="col-3 image-uploader">
            <div class="card">
                <input type="file" id="file" class="d-none" multiple>
                <label class="m-0 bg-light img-container" for="file" style="cursor: pointer;">
                    <div class="text-muted text-center align-middle py-3">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>
                </label>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>欢迎 {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! 'Welcome to the Dashboard' !!}

                </div>
            </div>
        </div>
    </div>
@endsection
