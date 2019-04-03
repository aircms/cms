@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        页面组件
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.fragment.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                名称
                                <span class="text-muted">/</span>
                                别名
                            </th>
                            <th>描述</th>
                            <th>
                                创建日期
                                <span class="text-muted">/</span>
                                更新日期
                            </th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        @foreach($fragments as $fragment)
                            <tr>
                                <th>
                                    <div>{{ $fragment->name }}</div>
                                    <small class="text-muted">{{ $fragment->slug }}</small>
                                </th>
                                <td>{{ $fragment->description }}</td>
                                <td>
                                    <div>{{ $fragment->created_at }}</div>
                                    <div>{{ $fragment->updated_at }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pages.fragment.edit', $fragment->id) }}"
                                       class="btn btn-primary btn-sm">
                                        编辑
                                    </a>

                                    <a href="{{ route('admin.pages.fragment.delete', $fragment->id) }}"
                                       class="btn btn-danger btn-sm">
                                        删除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

