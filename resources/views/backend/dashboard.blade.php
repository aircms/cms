@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . '管理仪表板')

@section('content')
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
