@php
    $items = $item->getMeta('items',[]);
    $value = $item->getMeta('value',[]);
    $inputName = $item->slug
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
        $('#file-{{$inputName}}').change(function (e) {
          $.each(e.target.files, function (index, file) {
            loadImage(file, function (img) {
              $(img).attr('class', 'card-img-top')

              var item = '<div class="col-3 {{$inputName}}-image-item-container">'
                + '<div class="card p-1">'
                + '<div class="image-placeholder"></div>'
                + '<div class="image-input-placeholder" data-name="' + file.name + '"></div>'
                + '<a href="#" class="btn btn-block btn-sm btn-danger mt-1 {{$inputName}}-btn-delete-image">删除</a>'
                + '</div></div>'

              $('.{{$inputName}}-image-uploader').before($(item))
              $('.{{$inputName}}-image-item-container:last .image-placeholder').replaceWith($(img))
            })
          })
        })

        $('body').on('click', '.{{$inputName}}-btn-delete-image', function (e) {
          e.preventDefault()
          $(this).closest('.{{$inputName}}-image-item-container').remove()
          return false
        })

        $('#file-{{$inputName}}').fileupload({
          url: "{{ route('admin.upload') }}",
          paramName: 'files[]',
          dataType: 'json',
          done: function (e, data) {
            $.each(data.result, function (index, file) {
              var input = $('<input type=hidden name="{{$inputName}}[]" value="' + file.path + '"/>')
              var selector = '.{{$inputName}}-image-item-container '
                + '.image-input-placeholder[data-name="' + file.name + '"]'
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
            <div class="col-3 {{ $inputName }}-image-item-container">
                <div class="card p-1">
                    <img src="{{ asset("storage/$image") }}" class="img-fluid">
                    {{ html()->hidden($inputName."[]", $image) }}
                    <a href="#" class="mt-1 btn btn-block btn-sm btn-danger {{$inputName}}-btn-delete-image">删除</a>
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
