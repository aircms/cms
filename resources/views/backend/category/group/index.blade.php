@extends('backend.layouts.app') 
@section('title', '分类管理') 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">分类管理</h4>
            </div>

            <div class="col-sm-7 pull-right">
                @include('backend.category.group.includes.header-buttons')
            </div>
        </div>

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
                                    <a href="{{ route('admin.category.group.edit', $root->id) }}" class="btn btn-primary"> 编辑 </a>
                                    <a href="{{ route('admin.category.group.delete', $root->id) }}" class="btn btn-danger"> 删除 </a>
                                    <a href="{{ route('admin.category.children.index',$root->id) }}" class="btn btn-primary"> 子分类管理 </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection