<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                常规
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> 指示板
                </a>
            </li>

            <li class="nav-title">
                系统
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="nav-icon icon-user"></i> 权限管理

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                用户管理

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                角色管理
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/post/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/post/*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> 发布管理
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
                    <i class="nav-icon icon-list"></i> 系统功能
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/utils/contact/*')) }}" href="{{ route('admin.utils.contact.waiting') }}">
                            联系我们
                        </a>
                    </li>
                </ul>
            </li>


            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/setting/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/setting/*')) }}" href="#">
                    <i class="nav-icon icon-list"></i> 系统设置
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/category/group/*')) }}" href="{{ route('admin.category.group.index') }}">
                            分类管理
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/post/type/*')) }}" href="{{ route('admin.post.type.index') }}">
                            发布类型
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/post/field/*')) }}" href="{{ route('admin.post.field.index') }}">
                            发布字段
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/item/*')) }}" href="{{ route('admin.setting.item.index') }}">
                            参数管理
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/setting/pages/*'), 'open') }}">
                        <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/setting/pages/*')) }}" href="#">
                            页面管理
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/pages/page/*')) }}" href="{{ route('admin.pages.page.index') }}">
                                    页面模板
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/setting/pages/fragment/*')) }}" href="{{ route('admin.pages.fragment.index') }}">
                                    页面组件
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/setting/configure/*/category'), 'open') }}">
                        <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/setting/configure/*/category')) }}" href="#">
                            参数配置
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
                    <i class="nav-icon icon-list"></i> 日志查看器
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            指示板
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            日志
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
