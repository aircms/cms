@extends('backend.layouts.app')

@section('title', '用户管理' . ' | ' . '已停用的用户')

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    用户管理
                    <small class="text-muted">已停用的用户</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>电子邮件</th>
                            <th>确认</th>
                            <th>角色</th>
                            <th>其它权限</th>
                            <th>Social</th>
                            <th>最后更新</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->confirmed_label !!}</td>
                                    <td>{!! $user->roles_label !!}</td>
                                    <td>{!! $user->permissions_label !!}</td>
                                    <td>{!! $user->social_buttons !!}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>{!! $user->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">未停用用户</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    用户数量：{{ $users->total() }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
