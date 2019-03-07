@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getFromAttributeOrMeta($inputName) : $inputValue;

@endphp

{{ html()->textarea($inputName,$value)->attributes($inputAttributes) }}


@include('includes.post.field.common.footer')


