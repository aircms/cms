@extends('backend.layouts.app') 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">{{ $type->name }}</h4>
            </div>

            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar">
                    <a href="{{ route('admin.post.create',$type->id) }}" class="btn btn-success ml-1">创建</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>标题 <span class="text-muted">/</span> 别名</th>
                            <th>状态</th>
                            <th>创建日期 <span class="text-muted">/</span> 更新日期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <strong class="d-block">{{ $post->title }}</strong>
                                <small class="text-muted"><a target="_blank" href="{{ route('frontend.post.slug',['slug'=>$post->slug]) }}">{{ $post->slug }}</a></small>
                            </td>
                            <td>{{ $post->status_text }}</td>
                            <td class="text-muted">
                                <div>{{ $post->created_at }}</div>
                                <div>{{ $post->updated_at }}</div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.post.edit', [$type->id,$post->id]) }}" class="btn btn-primary btn-sm"> 编辑 </a>
                                    <a href="{{ route('admin.post.delete', [$type->id,$post->id]) }}" class="btn btn-danger btn-sm"> 删除 </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($posts->hasMorePages())
    <div class="card-footer">
        {!! $posts->links() !!}
    </div>
    @endif
</div>
<!--card-->
@endsection