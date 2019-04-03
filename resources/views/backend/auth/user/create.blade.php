@extends('backend.layouts.app')

@section('title', '用户管理' . ' | ' . '新建用户')

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            用户管理
                            <small class="text-muted">新建用户</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                            <div class="col-md-10">
                                {{ html()->text('first_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                            <div class="col-md-10">
                                {{ html()->text('last_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('电子邮件地址')->class('col-md-2 form-control-label')->for('email') }}

                            <div class="col-md-10">
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder('电子邮件地址')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('密码')->class('col-md-2 form-control-label')->for('password') }}

                            <div class="col-md-10">
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder('密码')
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('确认密码')->class('col-md-2 form-control-label')->for('password_confirmation') }}

                            <div class="col-md-10">
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder('确认密码')
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('激活')->class('col-md-2 form-control-label')->for('active') }}

                            <div class="col-md-10">
                                <label class="switch switch-label switch-pill switch-primary">
                                    {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('已确认')->class('col-md-2 form-control-label')->for('confirmed') }}

                            <div class="col-md-10">
                                <label class="switch switch-label switch-pill switch-primary">
                                    {{ html()->checkbox('confirmed', true, '1')->class('switch-input') }}
                                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        @if(! config('access.users.requires_approval'))
                            <div class="form-group row">
                                {{ html()->label('发送确认电子邮件' . '<br/>' . '<small>' .  '(已确认则无效)' . '</small>')->class('col-md-2 form-control-label')->for('confirmation_email') }}

                                <div class="col-md-10">
                                    <label class="switch switch-label switch-pill switch-primary">
                                        {{ html()->checkbox('confirmation_email', true, '1')->class('switch-input') }}
                                        <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                    </label>
                                </div><!--col-->
                            </div><!--form-group-->
                        @endif

                        <div class="form-group row">
                            {{ html()->label(__('labels.backend.access.users.table.abilities'))->class('col-md-2 form-control-label') }}

                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>角色</th>
                                            <th>权限</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                @if($roles->count())
                                                    @foreach($roles as $role)
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div class="checkbox d-flex align-items-center">
                                                                    {{ html()->label(
                                                                            html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                                  ->class('switch-input')
                                                                                  ->id('role-'.$role->id)
                                                                            . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                        ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                        ->for('role-'.$role->id) }}
                                                                    {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                @if($role->id != 1)
                                                                    @if($role->permissions->count())
                                                                        @foreach($role->permissions as $permission)
                                                                            <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}
                                                                        @endforeach
                                                                    @else
                                                                        空
                                                                    @endif
                                                                @else
                                                                    所有权限
                                                                @endif
                                                            </div>
                                                        </div><!--card-->
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($permissions->count())
                                                    @foreach($permissions as $permission)
                                                        <div class="checkbox d-flex align-items-center">
                                                            {{ html()->label(
                                                                    html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                          ->class('switch-input')
                                                                          ->id('permission-'.$permission->id)
                                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                ->for('permission-'.$permission->id) }}
                                                            {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), '取消') }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit('创建') }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
