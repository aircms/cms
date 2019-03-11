@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))


@push('after-scripts')
    {{ script("/js/jquery.ui.widget.js") }}
    {{ script("/js/jquery.fileupload.js") }}
    {{ script("/js/load-image.js") }}

    <script>
      $(function () {
        $('#file').change(function (e) {
          console.log(e)

          $.each(e.target.files, function (index, file) {
            loadImage(file, function (img) {
              $(img).attr('class', 'card-img-top')

              var item = '<div class="col-3 image-item-container">'
                + '<div class="card">'
                + '<div class="image-placeholder"></div>'
                + '<div class="image-input-placeholder" data-name="' + file.name + '"></div>'
                + '</div></div>'

              $('.image-uploader').before($(item))

              $('.image-item-container:last .image-placeholder').replaceWith($(img))
            })
          })
        })

        $('#file').fileupload({
          url: "{{ route('admin.upload.image') }}",
          dataType: 'json',
          done: function (e, data) {
            $.each(data.result, function (index, file) {
              var input = $('<input type=hidden name="images[]" value="' + file.path + '"/>')
              $('.image-input-placeholder[data-name="' + file.name + ']').replaceWith(input)
            })
          },
        })
      })
    </script>
@endpush

@section('content')
    <div class="row image-list">

        <div class="col-3 image-uploader">
            <div class="card">
                <input type="file" id="file" class="d-none" multiple>
                <label class="m-0 bg-light img-container" for="file" style="cursor: pointer;">
                    <div class="text-muted text-center align-middle py-3">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>
                </label>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}

                </div>
            </div>
        </div>
    </div>
@endsection
