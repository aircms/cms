@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        发布字段
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.post.field.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>别名</th>
                            <th>描述</th>
                            <th>
                                创建日期
                                <span class="text-muted">/</span>
                                更新日期
                            </th>
                            <th>操作</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fields as $field)
                            <tr>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->slug }}</td>
                                <td>{{ $field->description }}</td>
                                <td>
                                    <div>{{ $field->created_at }}</div>
                                    <div>{{ $field->updated_at }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.post.field.up', $field->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="icon-arrow-up"></i>
                                    </a>
                                    <a href="{{ route('admin.post.field.down', $field->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="icon-arrow-down"></i>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.post.field.edit', $field->id) }}"
                                       class="btn btn-primary btn-sm">
                                        编辑
                                    </a>

                                    <a href="{{ route('admin.post.field.delete', $field->id) }}"
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
        </div><!--card-body-->
    </div><!--card-->
@endsection

