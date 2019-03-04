@extends('backend.layouts.app')

@section('content')

    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.contact.management')

                        <small class="text-muted">
                            @lang('labels.backend.contact.view')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                <div class="col table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="text-right w-25">@lang('labels.backend.contact.name')</th>
                            <td>{{ $contact->name }}</td>
                        </tr>

                        <tr>
                            <th class="text-right w-25">@lang('labels.backend.contact.age')</th>
                            <td>{{ $contact->age }}</td>
                        </tr>

                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.sex')</th>
                            <td>{{ $contact->sex_text }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.phone_number')</th>
                            <td>{{ $contact->phone_number }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.email')</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.address')</th>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.title')</th>
                            <td>{{ $contact->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.message')</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.reply')</th>
                            <td>{{ $contact->reply }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">@lang('labels.backend.contact.reply_channel')</th>
                            <td>{{ $contact->reply_channel_text }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--card-body-->
    </div><!--card-->
@endsection
