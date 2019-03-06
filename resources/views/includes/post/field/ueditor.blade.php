@include('includes.post.field.textarea')

{{-- remember to @include('vendor.ueditor.assets') --}}

<!-- 实例化编辑器 -->
<script type="text/javascript">
  {{--var ue = UE.getEditor('{{ array_get($input,'name') }}', {--}}
    {{--initialFrameHeight: 500,--}}
  {{--})--}}
  {{--ue.ready(function () {--}}
    {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}')--}}
  {{--})--}}
</script>
