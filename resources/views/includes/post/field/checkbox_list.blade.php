@extends('includes.post.field.common.input')

@section('input')
    @php
        $inputName = array_get($input, 'name', "");
        $inputValue = array_get($input, 'value', "");
        $inputAttributes = array_get($input, 'attributes', []);

        $labelName = array_get($label, 'name', "");
        $labelAttributes = array_get($label, 'attributes', []);

        $inline =  array_get($input,'inline',false);

        $metaValue = $post->getMeta($inputName);

        $inputChecked = isset($post)?$metaValue == $inputValue:array_get($input,'checked',false);
    @endphp

    {{ html()->checkbox($inputName,$inputChecked, $inputValue)->attributes($inputAttributes) }}
    {{ html()->label($labelName)->class('form-check-label')->attributes($labelAttributes)->for($inputName) }}

    @foreach(array_get($input,'items') as $itemKey=>$itemLabel)
        <div class="form-check {{ $inline ?"form-check-inline":"" }}">
            @isset($post)
                {{
                html()
                ->checkbox(array_get($input,'name',"")."[]",in_array($itemKey,$post->getMeta(array_get($input,'name',""))), $itemKey)
                ->id(array_get($input,'name',"")."-".$itemKey)
                ->attributes(array_get($input,'attributes',[]))
                }}
            @else
                {{
                html()
                ->checkbox(array_get($input,'name',"")."[]",in_array($itemKey,array_get($input,'value',[])), $itemKey)
                ->id(array_get($input,'name',"")."-".$itemKey)
                ->attributes(array_get($input,'attributes',[]))
                }}
            @endisset
            {{ html()->label($itemLabel)->class('form-check-label')->for(array_get($input,'name',"").'-'.$itemKey) }}
        </div>
    @endforeach

@endsection
