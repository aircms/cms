@include('includes.post.field.common.header')

@php
    $inputName = array_get($input, 'name', "");
    $inputNames = $inputName."[]";

    $inputValue = array_get($input, 'value', []);
    $inputAttributes = array_get($input, 'attributes', []);

    $labelName = array_get($label, 'name', "");
    $labelAttributes = array_get($label, 'attributes', []);

    $value = isset($post) ? $post->getMeta($inputName,$inputValue) : $inputValue;

    /** @var \App\Models\Category $rootCategory */
    $category = \App\Models\Category::whereSlug(array_get($input,'group',''))->whereIsRoot()->first();

    $items = $category->flatIndentMap();
@endphp

@foreach($items as $itemKey=>$itemLabel)
    <div class="form-check {{ array_get($input,'inline',false) ?"form-check-inline":"" }}">
        {{ html()->checkbox($inputNames,in_array($itemKey,$value), $itemKey)->id($inputName."-".$itemKey)->attributes($inputAttributes) }}
        {{ html()->label($itemLabel)->class('form-check-label')->for($inputName.'-'.$itemKey) }}
    </div>

@endforeach

@include('includes.post.field.common.footer')

