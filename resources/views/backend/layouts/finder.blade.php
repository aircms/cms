<!DOCTYPE html>
{{--@langrtl--}}
    {{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">--}}
{{--@else--}}
    {{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--@endlangrtl--}}
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}

    @stack('after-styles')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route("admin.finder.dir",['d'=>'/']) }}">根目录</a></li>
                    @foreach($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item"><a href="{{ route("admin.finder.dir",['d'=>$breadcrumb['path']]) }}">{{ $breadcrumb['title'] }}</a></li>
                    @endforeach
                </ol>

            <div class="container-fluid">
                <div class="animated fadeIn">
                    @include('includes.partials.messages')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')
</body>
</html>
