@extends('frontend.single-column-layout')

@section('title', app_name())

@section('main')
    <h1>{{ $post->title }}</h1>
    <div class="text-muted">
        <span class="d-block">{{ $post->created_at }}</span>
        <span class="d-block">{{ $post->updated_at }}</span>
    </div>
    <div class="content">
        {!! $post->getMeta('content') !!}
    </div>
    <hr>
@endsection
