@extends('backend.layouts.app')

@section('title', '角色管理' . ' | ' . '新建角色')

@section('content')
{{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        角色管理
                        <small class="text-muted">新建角色</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('名称')
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('名称')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('关联的权限')
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
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
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.role.index'), '取消') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('创建') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
