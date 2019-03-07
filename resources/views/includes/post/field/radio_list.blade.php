@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");

    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getFromAttributeOrMeta($inputName,[]) : $inputValue;
    $items = array_get($input,'items');
@endphp

@foreach($items as $itemKey=>$itemLabel)
    <div class="form-check {{ array_get($input,'inline',false) ?"form-check-inline":"" }}">
        {{ html()->radio($inputName,$itemKey==$value, $itemKey)->id($inputName."-".$itemKey)->attributes($inputAttributes) }}
        {{ html()->label($itemLabel)->class('form-check-label')->for($inputName.'-'.$itemKey) }}
    </div>
@endforeach


@include('includes.post.field.common.footer')
