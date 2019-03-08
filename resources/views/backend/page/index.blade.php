@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.page.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.page.includes.header-buttons')
                </div><!--col-->
            </div>

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                @lang('labels.backend.page.name')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.page.slug')
                            </th>
                            <th>@lang('labels.backend.page.description')</th>
                            <th>
                                @lang('labels.backend.page.created_at')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.page.updated_at')
                            </th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        @foreach($pages as $page)
                            <tr>
                                <th>
                                    <div>{{ $page->name }}</div>
                                    <small class="text-muted">{{ $page->slug }}</small>
                                </th>
                                <td>{{ $page->description }}</td>
                                <td>
                                    <div>{{ $page->created_at }}</div>
                                    <div>{{ $page->updated_at }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pages.page.edit', $page->id) }}"
                                       class="btn btn-primary btn-sm">
                                        @lang('buttons.general.crud.edit')
                                    </a>

                                    <a href="{{ route('admin.pages.page.delete', $page->id) }}"
                                       class="btn btn-danger btn-sm">
                                        @lang('buttons.general.crud.delete')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-->

@endsection

