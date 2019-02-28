@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.category.children.management')

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
                                <th>@lang('labels.backend.category.group.table.name')</th>
                                <th>
                                    @lang('labels.backend.category.children.table.slug')
                                    <span class="text-muted">/</span>
                                    @lang('labels.backend.category.children.table.description')
                                </th>
                                <th>@lang('labels.general.actions')</th>
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
                                            <i class="icon-arrow-up"></i>
                                        </a>
                                        <a href="{{ route('admin.category.children.down', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="icon-arrow-down"></i>
                                        </a>

                                        <a href="{{ route('admin.category.children.create.child', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info btn-sm">
                                            @lang('labels.backend.category.children.create_child')
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.category.children.edit', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-primary btn-sm">
                                            @lang('buttons.general.crud.edit')
                                        </a>

                                        <a href="{{ route('admin.category.children.delete', [$request->ancestor,$child->id]) }}"
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

