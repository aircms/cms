@include('includes.post.field.common.header')

@foreach(array_get($input,'items') as $itemKey=>$itemLabel)
    <div class="form-check {{ array_get($input,'inline',false) ?"form-check-inline":"" }}">
        @isset($post)
            {{
            html()
            ->radio(array_get($input,'name',""),$itemKey==$post->getMeta(array_get($input,'name',"")), $itemKey)
            ->id(array_get($input,'name',"")."-".$itemKey)
            ->attributes(array_get($input,'attributes',[]))
            }}
        @else
            {{
            html()
            ->radio(array_get($input,'name',""),$itemKey==array_get($input,'value',""), $itemKey)
            ->id(array_get($input,'name',"")."-".$itemKey)
            ->attributes(array_get($input,'attributes',[]))
            }}
        @endisset
        {{ html()->label($itemLabel)->class('form-check-label')->for(array_get($input,'name',"").'-'.$itemKey) }}
    </div>
@endforeach

@include('includes.post.field.common.footer')

