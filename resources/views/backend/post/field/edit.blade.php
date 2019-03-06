@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.post.field.update',$field->id))->class('form-horizontal')->open() }}
    <div class="card">


        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.post.field.management')

                        <small class="text-muted">
                            @lang('labels.backend.post.field.edit')
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    {{-- type  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.field.type'))->class('col-md-2 form-control-label')->for('type') }}
                        <div class="col-md-10">
                            {{ html()->select('type', \App\Models\Post\Type\Fields::all(),$field->type)->class('form-control') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- name  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.field.name'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('name')->value($field->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- slug  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.field.slug'))->class('col-md-2 form-control-label')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('slug')->value($field->slug)->class('form-control')->attribute('maxlength', 190) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- description  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.field.description'))->class('col-md-2 form-control-label')->for('description') }}
                        <div class="col-md-10">
                            {{ html()->textarea('description')->value($field->description)->class('form-control')->attribute('rows', 5) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    {{-- configure  --}}
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.post.field.configure'))->class('col-md-2 form-control-label')->for('configure') }}
                        <div class="col-md-10">
                            {{ html()->textarea('configure',$configure)->class('form-control')->attribute('rows',10) }}

                            <div class="mt-2">
                                <a href="#" class="btn btn-info load-field-demo"
                                   data-url="{{ route('admin.post.field.demo','--demo--') }}">加载示例</a>
                            </div>
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

@include('backend.includes.components.yaml',['component'=>'configure'])

@push('after-scripts')
    <script>
      $('body').on('click', '.load-field-demo', function (e) {
        e.preventDefault()

        let url = $('.load-field-demo').
          attr('data-url').
          replace('--demo--', $('#type').val())

        console.log('url:', url)
        axios.get(url).then(function (response) {
          console.log(response)
          editor.setValue(response.data.string)
        }).catch(function (error) {
          console.error(error)
        })

        return false
      })
    </script>
@endpush
