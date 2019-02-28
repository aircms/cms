@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        <span>{{ $ancestor->name }}</span>
                        @lang('labels.backend.category.children.management')
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
                                <th>@lang('labels.backend.category.children.table.slug')</th>
                                <th>@lang('labels.backend.category.children.table.description')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($children as $child)
                                <tr>
                                    <td>{{ $child->name }}</td>
                                    <td>{{ $child->slug }}</td>
                                    <td>{{ $child->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.children.edit', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-primary">
                                            @lang('buttons.general.crud.edit')
                                        </a>

                                        <a href="{{ route('admin.category.children.delete', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-danger">
                                            @lang('buttons.general.crud.delete')
                                        </a>

                                        <a href="{{ route('admin.category.children.create.child', [$request->ancestor,$child->id]) }}"
                                           class="btn btn-info">
                                            @lang('labels.backend.category.children.create')
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

