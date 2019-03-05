@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.configure.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar">
                        <a href="{{ route('admin.setting.configure.create') }}" class="btn btn-success ml-1">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                @lang('labels.backend.configure.name')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.configure.slug')
                            </th>
                            <th>@lang('labels.backend.configure.category')</th>
                            <th>@lang('labels.backend.configure.type')</th>
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
                                <td>
                                    <div>{{ $item->name }}</div>
                                    <small class="text-muted">{{$category->slug}}.{{ $item->slug }}</small>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ \App\Traits\SettingItemType::typeDescription($item->type) }}</td>
                                <td>
                                    <a href="{{ route('admin.setting.configure.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        @lang('buttons.general.crud.edit')
                                    </a>

                                    <a href="{{ route('admin.setting.configure.delete', $item->id) }}" class="btn btn-danger btn-sm">
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
    </div><!--card-->

@endsection

