@extends('backend.layouts.app')

@section('title',  '分类管理')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        分类管理
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.category.group.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>别名</th>
                                <th>描述</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roots as $root)
                                <tr>
                                    <td>{{ $root->name }}</td>
                                    <td>{{ $root->slug }}</td>
                                    <td>{{ $root->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.group.edit', $root->id) }}" class="btn btn-primary">
                                            编辑
                                        </a>

                                        <a href="{{ route('admin.category.group.delete', $root->id) }}" class="btn btn-danger">
                                            删除
                                        </a>

                                        {{-- 子分类--}}
                                        <a href="{{ route('admin.category.children.index',$root->id) }}"
                                           class="btn btn-primary">
                                            子分类管理
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

