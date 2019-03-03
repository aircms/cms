@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">{{ $type->name }}</h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar"
                         aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.post.create',$type->id) }}" class="btn btn-success ml-1"
                           data-toggle="tooltip" title="@lang('labels.general.create')">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <td class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    @lang('labels.backend.post.title')
                                    <span class="text-muted">/</span>
                                    @lang('labels.backend.post.slug')
                                </th>
                                <th>@lang('labels.backend.post.status')</th>
                                <th>
                                    @lang('labels.backend.post.field.created_at')
                                    <span class="text-muted">/</span>
                                    @lang('labels.backend.post.field.updated_at')
                                </th>
                                <th>@lang('labels.general.actions')</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <div>{{ $post->title }}</div>
                                        <small class="text-muted">{{ $post->slug }}</small>
                                    </td>
                                    <td>{{ $post->status_text }}</td>
                                    <td>
                                        <div>{{ $post->created_at }}</div>
                                        <div>{{ $post->updated_at }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.post.edit', [$type->id,$post->id]) }}"
                                           class="btn btn-primary btn-sm">
                                            @lang('buttons.general.crud.edit')
                                        </a>

                                        <a href="{{ route('admin.post.delete', [$type->id,$post->id]) }}"
                                           class="btn btn-danger btn-sm">
                                            @lang('buttons.general.crud.delete')
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div><!--col-->
        </div><!--row-->

        @if($posts->count())
            <div class="card-footer">
                {!! $posts->links() !!}
            </div>
        @endif
    </div><!--card-->

@endsection

