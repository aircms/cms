<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('img/backend/brand/logo.svg') }}" width="89" height="25" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="fas fa-home"></i></a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">指示板</a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto mr-4">
        <li class="nav-item pr-3">
            <span>您好，</span>
            <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger" href="{{ route('frontend.auth.logout') }}">
                <i class="fas fa-sign-out-alt"></i> 退出登录
            </a>
          </div>
        </li>
    </ul>
</header>
