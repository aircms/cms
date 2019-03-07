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
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

