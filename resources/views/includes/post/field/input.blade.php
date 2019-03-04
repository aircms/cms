@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $metaValue = $post->getMeta($inputName);

    $value = isset($post) ? $metaValue : $inputValue;

@endphp

{{ html()->text($inputName,$value)->attributes($inputAttributes) }}


@include('includes.post.field.common.footer')

