@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

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
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}

                </div>
            </div>
        </div>
    </div>
@endsection
