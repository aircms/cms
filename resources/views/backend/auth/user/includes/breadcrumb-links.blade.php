<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.auth.user.index') }}">所有用户</a>
                <a class="dropdown-item" href="{{ route('admin.auth.user.create') }}">新建用户</a>
                <a class="dropdown-item" href="{{ route('admin.auth.user.deactivated') }}">未激活的用户</a>
                <a class="dropdown-item" href="{{ route('admin.auth.user.deleted') }}">已删除的用户</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
