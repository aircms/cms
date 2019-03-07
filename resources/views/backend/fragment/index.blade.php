@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.post.type.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.post.type.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.post.type.name')</th>
                            <th>@lang('labels.backend.post.type.slug')</th>
                            <th>@lang('labels.backend.post.type.description')</th>
                            <th>
                                @lang('labels.backend.post.type.created_at')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.post.type.updated_at')
                            </th>
                            <th>@lang('labels.general.actions')</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>{{ $type->description }}</td>
                                <td>
                                    <div>{{ $type->created_at }}</div>
                                    <div>{{ $type->updated_at }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.post.type.up', $type->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="icon-arrow-up"></i>
                                    </a>
                                    <a href="{{ route('admin.post.type.down', $type->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="icon-arrow-down"></i>
                                    </a>

                                    <a href="{{ route('admin.post.layout.index', $type->id) }}"
                                       class="btn btn-info btn-sm">
                                        @lang('labels.backend.post.type.manage_layout')
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.post.type.edit', $type->id) }}"
                                       class="btn btn-primary btn-sm">
                                        @lang('buttons.general.crud.edit')
                                    </a>

                                    <a href="{{ route('admin.post.type.delete', $type->id) }}"
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
        </div><!--card-body-->
    </div><!--card-->
@endsection

