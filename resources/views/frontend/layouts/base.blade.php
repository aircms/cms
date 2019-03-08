<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    @stack('head-begin')

    <title>@yield('title')</title>
    <meta name="keyword" content="@yield('keyword')">
    <meta name="description" content="@yield('description')">

    <meta name="viewport"
          content="width=device-width,height=device-height,user-scalable=no,initial-scale=1,minimum-scale=1,maximum-scale=1,target-densitydpi=device-dpi">
    <meta name="format-detection" content="telphone=no,email=no">
    <meta name="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="Cache-Control" content="no-siteapp">

    <!--[if lt ie 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('styles')

    @stack('head-end')
</head>
<body>
@stack('body-begin')

@yield('body')

@stack('scripts')

@stack('body-end')
</body>
</html>
