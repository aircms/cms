@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        子分类管理

                        <small class="text-muted">{{ $ancestor->name }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.category.children.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>
                                    别名
                                    <span class="text-muted">/</span>
                                    描述
                                </th>
                                <th>操作</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($children as $child)
                                <tr>
                                    <td>
                                        {{ $child->depthPrefix() }}
                                        {{ $child->name }}
                                    </td>
                                    <td>
                                        <div>{{ $child->slug }}</div>
                                        {{ $child->description }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.children.up', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-chevron-up"></i>
                                        </a>
                                        <a href="{{ route('admin.category.children.down', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="fas fa-chevron-down"></i>
                                        </a>

                                        <a href="{{ route('admin.category.children.create.child', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info btn-sm">
                                            添加子分类
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.category.children.edit', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-primary btn-sm">
                                            编辑
                                        </a>

                                        <a href="{{ route('admin.category.children.delete', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-danger btn-sm">
                                            删除
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{--{!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}--}}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {{--{!! $roles->render() !!}--}}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

