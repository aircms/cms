<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="nav-icon icon-user"></i> @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/post/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/post/*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> @lang('labels.backend.post.management')
                </a>

                <ul class="nav-dropdown-items">
                    @foreach($postTypes as $postType)
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/post/'.$postType->id.'/*')) }}" href="{{ route('admin.post.index',$postType->id) }}">
                            {{ $postType->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/utils/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/utils/*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> @lang('labels.backend.system.utils')
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/utils/contact/*')) }}" href="{{ route('admin.utils.contact.waiting') }}">
                            @lang('labels.backend.contact.management')
                        </a>
                    </li>
                </ul>
            </li>


            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/setting/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/setting/*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> @lang('labels.backend.system.setting')
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/category/group/*')) }}" href="{{ route('admin.category.group.index') }}">
                            @lang('labels.backend.category.group.management')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/post/type/*')) }}" href="{{ route('admin.post.type.index') }}">
                            @lang('labels.backend.post.type.management')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/post/field/*')) }}" href="{{ route('admin.post.field.index') }}">
                            @lang('labels.backend.post.field.management')
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/item/*')) }}" href="{{ route('admin.setting.item.index') }}">
                            @lang('menus.backend.item.index')
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/setting/configure/*/category'), 'open') }}">
                        <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/setting/configure/*/category')) }}" href="#">
                            @lang('menus.backend.configure.management')
                        </a>

                        <ul class="nav-dropdown-items">
                            @foreach($settingCategories as $category)
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/configure/'.$category->id.'/category')) }}" href="{{ route('admin.setting.configure.category',$category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>


            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> @lang('menus.backend.log-viewer.main')
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            @lang('menus.backend.log-viewer.dashboard')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            @lang('menus.backend.log-viewer.logs')
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
