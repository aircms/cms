@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getFromAttributeOrMeta($inputName) : $inputValue;
@endphp

@push('after-scripts')
    @if(!isset($globalVar['ajax_image_uploader'])||!$globalVar['ajax_image_uploader'])
        {{ script("/js/jquery.ui.widget.js") }}
        {{ script("/js/jquery.fileupload.js") }}
        {{ script("/js/load-image.js") }}
        @php
            $globalVar['ajax_image_uploader'] = true;
        @endphp
    @endif

    <script>
      $(function () {
        $('#file-{{ $inputName }}').change(function (e) {
          $.each(e.target.files, function (index, file) {
            loadImage(file, function (img) {
              $(img).attr('class', 'img-fluid')
              $('.{{ $inputName }}-img-container').html($(img))
            })
          })
        })

        $('#file-{{ $inputName }}').fileupload({
          paramName: 'files[]',
          url: "{{ route('admin.upload.image') }}",
          dataType: 'json',
          done: function (e, data) {
            var file = data.result[0]
            $("#{{ $inputName }}").val(file.path)
          },
        })
      })
    </script>
@endpush


<div class="card p-1 bg-light" style="border: 1px solid #e4e7ea">
    {{ html()->file('file-'.$inputName)->attributes(['style'=>'display:none'])->id('file-'.$inputName)->name(null) }}
    {{ html()->hidden($inputName) }}
    <label class="m-0 {{$inputName}}-img-container" for="file-{{ $inputName }}" style="cursor: pointer;">
        @if (empty($value))
            <div class="text-muted text-center align-middle py-3">
                <i class="fa fa-plus fa-3x"></i>
            </div>
        @else
            <img src="{{ asset("storage/$value") }}" class="img-fluid">
        @endif
    </label>
</div>


@include('includes.post.field.common.footer')

