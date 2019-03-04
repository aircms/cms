@extends('backend.layouts.app')


@section('breadcrumb-links')
    @include('backend.utils.contact.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.contact.replied')
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
                            <th>@lang('labels.backend.contact.name')</th>
                            <th>@lang('labels.backend.contact.sex')</th>
                            <th>@lang('labels.backend.contact.age')</th>
                            <th>@lang('labels.backend.contact.phone_number')</th>
                            <th>@lang('labels.backend.contact.email')</th>
                            <th>@lang('labels.backend.contact.created_at')</th>
                            <th>@lang('labels.backend.contact.updated_at')</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->sex_text }}</td>
                                <td>{{ $contact->age }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>{{ $contact->updated_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        查看详情
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--card-body-->
        @if ($contacts->hasMorePages())
            <div class="card-footer">
                {!! $contacts->links() !!}
            </div>
        @endif
    </div><!--card-->
@endsection

