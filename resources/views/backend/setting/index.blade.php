@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        参数配置
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar">
                        <a href="{{ route('admin.setting.item.create') }}" class="btn btn-success ml-1">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--row-->

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>名称/别名</th>
                    <th>分组</th>
                    <th>类型</th>
                    <th>操作</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    @php
                        $category = $item->categories->first();
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $item->name }}</strong>
                            <div class="text-muted">
                                {{$category->slug}}.{{ $item->slug }}
                            </div>
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ \App\Traits\SettingItemType::typeDescription($item->type) }}</td>
                        <td>
                            <a href="{{ route('admin.setting.item.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                编辑
                            </a>

                            <a href="{{ route('admin.setting.item.delete', $item->id) }}" class="btn btn-danger btn-sm">
                                删除
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.setting.item.up', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-chevron-up"></i>
                            </a>
                            <a href="{{ route('admin.setting.item.down', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!--card-->

@endsection

