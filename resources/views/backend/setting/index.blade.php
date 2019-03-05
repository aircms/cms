@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.setting.item.management')
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
                    <th>@lang('labels.backend.setting.name')</th>
                    <th>@lang('labels.backend.setting.slug')</th>
                    <th>@lang('labels.backend.setting.category')</th>
                    <th>@lang('labels.backend.setting.type')</th>
                    <th>@lang('labels.general.actions')</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    @php
                        $category = $item->categories->first();
                    @endphp
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{$category->slug}}.{{ $item->slug }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ \App\Traits\SettingItemType::typeDescription($item->type) }}</td>
                        <td>
                            <a href="{{ route('admin.setting.item.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                @lang('buttons.general.crud.edit')
                            </a>

                            <a href="{{ route('admin.setting.item.delete', $item->id) }}" class="btn btn-danger btn-sm">
                                @lang('buttons.general.crud.delete')
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.setting.item.up', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="icon-arrow-up"></i>
                            </a>
                            <a href="{{ route('admin.setting.item.down', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="icon-arrow-down"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!--card-->

@endsection

