{{ html()->textarea($item->slug,$item->getMeta('value')) }}

<!-- 实例化编辑器 -->
<script type="text/javascript">
  var ue = UE.getEditor('{{ $item->slug }}', {
    initialFrameHeight: 300,
    autoHeightEnabled: false,
  })
  ue.ready(function () {
    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}')
  })
</script>
