@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputValue = array_get($input, 'value', "");
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $inputChecked = isset($post)? $post->getFromAttributeOrMeta($inputName) == $inputValue : array_get($input,'checked',false);

@endphp


{{ html()->radio($inputName,$inputChecked, $inputValue)->attributes($inputAttributes) }}
{{ html()->label($labelName)->class('form-check-label')->attributes($labelAttributes)->for($inputName) }}


@include('includes.post.field.common.footer')
