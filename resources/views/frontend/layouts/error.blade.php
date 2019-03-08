<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    @stack('metas')

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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    @stack('styles')

    <link rel="stylesheet" href="{{ asset('assets/main.min.css') }}">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="card border-0">
        <div class="card-body text-center text-danger">
            <p class="display-1">@yield('message')</p>
        </div>
        <div class="card-body text-center">
            <a href="/" class="btn btn-primary">返回首页</a>
        </div>
    </div>
</div>


@stack('scripts')

</body>
</html>
