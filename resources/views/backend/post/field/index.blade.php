@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.post.field.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.post.field.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <td class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.post.field.name')</th>
                                <th>@lang('labels.backend.post.field.slug')</th>
                                <th>@lang('labels.backend.post.field.description')</th>
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
                                            @lang('buttons.general.crud.edit')
                                        </a>

                                        <a href="{{ route('admin.post.field.delete', $field->id) }}"
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

