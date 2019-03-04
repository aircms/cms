@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getMeta($inputName,$inputValue) : $inputValue;

    $items = array_get($input,'items');
@endphp

{{ html()->select($inputName,$items,$value)->attributes($inputAttributes) }}


@include('includes.post.field.common.footer')

