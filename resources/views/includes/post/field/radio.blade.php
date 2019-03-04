@include('includes.post.field.common.header')

@isset($post)
    {{
    html()
    ->radio(array_get($input,'name',""),$post->getMeta(array_get($input,'name',"")))
    ->attributes(array_get($input,'attributes',[]))
    }}
@else
    {{
    html()
    ->radio(array_get($input,'name',""),array_get($input,'value',""))
    ->attributes(array_get($input,'attributes',[]))
    }}
@endisset

@include('includes.post.field.common.footer')

