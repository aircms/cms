@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getFromAttributeOrMeta($inputName,[]) : $inputValue;
@endphp

@push('after-scripts')
    @dump($globalVar)
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
        $('#file-{{$inputName}}').change(function (e) {
          $.each(e.target.files, function (index, file) {
            loadImage(file, function (img) {
              $(img).attr('class', 'card-img-top')

              var item = '<div class="col-3 {{$inputName}}-image-item-container">'
                + '<div class="card">'
                + '<div class="image-placeholder"></div>'
                + '<div class="image-input-placeholder" data-name="' + file.name + '"></div>'
                + '</div></div>'

              $('.{{$inputName}}-image-uploader').before($(item))
              $('.{{$inputName}}-image-item-container:last .image-placeholder').replaceWith($(img))
            })
          })
        })

        $('#file-{{$inputName}}').fileupload({
          url: "{{ route('admin.upload.image') }}",
          paramName: 'files[]',
          dataType: 'json',
          done: function (e, data) {
            $.each(data.result, function (index, file) {
              var input = $('<input type=hidden name="{{$inputName}}[]" value="' + file.path + '"/>')
              var selector = ".{{$inputName}}-image-item-container .image-input-placeholder[data-name='"+file.name+"']"
              $(selector).replaceWith(input)
            })
          },
        })
      })
    </script>
@endpush

<div class="row {{ $inputName }}-image-list">
    @if(!empty($value))
        @foreach($value as $image)
            <img src="{{ $value }}" class="img-fluid">
            <div class="col-3 {{$imageName}}-image-item-container">
                <div class="card">
                    <img src="{{ asset("storage/$image") }}" class="img-fluid">
                    {{ html()->hidden($inputName."[]",$image) }}
                </div>
            </div>
        @endforeach
    @endif

    <div class="col-3 {{$inputName}}-image-uploader">
        <div class="card">
            {{ html()->file('file-'.$inputName)->attributes(['style'=>'display:none'])->multiple()->id('file-'.$inputName)->name(null) }}
            <label class="m-0 bg-light {{$inputName}}}-img-container" for="file-{{$inputName}}"
                   style="cursor: pointer;">
                <div class="text-muted text-center align-middle py-3">
                    <i class="fa fa-plus fa-3x"></i>
                </div>
            </label>
        </div>
    </div>
</div>

@include('includes.post.field.common.footer')


