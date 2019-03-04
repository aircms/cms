<!-- form field -->
{{ html()->div()->attributes(\Illuminate\Support\Arr::get($wrapper,'all',[]))->open() }}

    @if ($label !== false)
        {{ html()->label(\Illuminate\Support\Arr::get($label,'name'))->attributes(\Illuminate\Support\Arr::get($label,'attributes',[])) }}
    @endif

    {{ html()->div()->attributes(\Illuminate\Support\Arr::get($wrapper,'input',[]))->open() }}

        {{
        html()
        ->textarea(\Illuminate\Support\Arr::get($input,'name',""),\Illuminate\Support\Arr::get($input,'value',""))
        ->attributes(\Illuminate\Support\Arr::get($input,'attributes',[]))
        }}

    {{ html()->div()->close() }}
{{ html()->div()->close() }}

@include('vendor.ueditor.assets')

<!-- 实例化编辑器 -->
<script type="text/javascript">
  var ue = UE.getEditor('{{ \Illuminate\Support\Arr::get($input,'name') }}',{
    initialFrameHeight: 500,
  });
  ue.ready(function() {
    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
  });
</script>
