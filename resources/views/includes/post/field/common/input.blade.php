<!-- form field -->
{{ html()->div()->attributes(array_get($wrapper,'all',[]))->open() }}

@if ($label !== false)
    {{ html()->label(array_get($label,'name'))->attributes(array_get($label,'attributes',[])) }}
@endif

{{ html()->div()->attributes(array_get($wrapper,'input',[]))->open() }}

@php
$inputName = array_get($input, 'name', "");
$inputValue = array_get($input, 'value', "");
$inputAttributes = array_get($input, 'attributes', []);

$labelName = array_get($label, 'name', "");
$labelAttributes = array_get($label, 'attributes', []);

$metaValue = $post->getMeta($inputName);
@endphp

@yield('input')

{{ html()->div()->close() }}
{{ html()->div()->close() }}
