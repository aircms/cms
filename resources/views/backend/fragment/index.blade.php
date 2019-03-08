@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.fragment.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.fragment.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                @lang('labels.backend.fragment.name')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.fragment.slug')
                            </th>
                            <th>@lang('labels.backend.fragment.description')</th>
                            <th>
                                @lang('labels.backend.fragment.created_at')
                                <span class="text-muted">/</span>
                                @lang('labels.backend.fragment.updated_at')
                            </th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        @foreach($fragments as $fragment)
                            <tr>
                                <th>
                                    <div>{{ $fragment->name }}</div>
                                    <small class="text-muted">{{ $fragment->slug }}</small>
                                </th>
                                <td>{{ $fragment->description }}</td>
                                <td>
                                    <div>{{ $fragment->created_at }}</div>
                                    <div>{{ $fragment->updated_at }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pages.fragment.edit', $fragment->id) }}"
                                       class="btn btn-primary btn-sm">
                                        @lang('buttons.general.crud.edit')
                                    </a>

                                    <a href="{{ route('admin.pages.fragment.delete', $fragment->id) }}"
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
        </div><!--card-body-->
    </div><!--card-->
@endsection

