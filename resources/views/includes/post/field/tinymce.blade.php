@include('includes.post.field.textarea')

{{-- remember to @include('vendor.ueditor.assets') --}}

<!-- 实例化编辑器 -->
@push('after-scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
      tinymce.init({
        selector: "#{{ array_get($input,'name') }}",
        language: 'zh_CN',
        width: '100%',
        height: 500,
        statusbar: false,
        toolbar: 'image',
        plugins: 'image imagetools',
        file_picker_types: 'file image media',
        images_upload_url: 'postAcceptor.php',
        automatic_uploads: false,
      })
    </script>
@endpush
