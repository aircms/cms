@extends('backend.layouts.app')

@section('content')

    {{ html()->form('POST', route('admin.utils.contact.send',$contact->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.contact.management')

                        <small class="text-muted">
                            @lang('labels.backend.contact.reply')
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
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col">

                    {{-- reply  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.contact.reply'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->textarea('reply')->value($contact->reply)->class('form-control')->attribute('maxlength', 190) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- channel  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.contact.reply_channel'))->class('col-md-2 form-control-label')->for('description') }}
                        <div class="col-md-10">

                            @foreach($contact->channels() as $channelID =>$channelName)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="reply_channel[]" type="checkbox"
                                           id="channel-{{ $channelID }}" value="{{ $channelID }}">
                                    <label class="form-check-label"
                                           for="channel-{{ $channelID }}">{{ $channelName }}</label>
                                </div>
                            @endforeach
                        </div><!--col-->
                    </div><!--form-group-->


                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    {{ form_submit(__('buttons.general.crud.edit'))->class('mr-2') }}
                </div>
            </div>
        </div><!--card-footer-->


    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
