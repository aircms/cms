@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))


@push('after-scripts')
    {{ script("/js/jquery.ui.widget.js") }}
    {{ script("/js/jquery.fileupload.js") }}
    {{ script("/js/load-image.js") }}

    <script>
      $(function () {
        $('#file').change(function (e) {
          loadImage(
            e.target.files[0],
            function (img) {
              $(img).attr('class', 'card-img-top')
              $('.img-container').html('').append($(img))
            },
          )
        })

        $('#file').fileupload({
          url: "{{ route('admin.upload.image') }}",
          dataType: 'json',
          done: function (e, data) {
            $('.progress').toggle()

            $.each(data.files, function (index, file) {
              $('<p/>').text(file.name).appendTo('.card-body')
            })
          },
          progressall: function (e, data) {
            $('.progress').toggle()

            var progress = parseInt(data.loaded / data.total * 100, 10)
            $('.progress .progress-bar').css('width', progress + '%')
          },
        })
      })
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <input type="file" id="file" class="d-none">

                <label class="m-0 bg-secondary click-to-upload img-container border p-2" for="file" style="cursor: pointer;">
                    <div class="text-muted text-center align-middle py-3">
                        <i class="fa fa-plus fa-3x"></i>
                    </div>
                </label>

                <div class="progress d-none" style="height: 2px;">
                    <div class="progress-bar"></div>
                </div>
                <div class="card-body d-none">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card </p>
                </div>
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
