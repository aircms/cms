@php
    $items = ['否','是'];
    $value = $item->getMeta('value',0);
@endphp

@foreach($items as $itemKey=>$itemLabel)
    <div class="form-check form-check-inline">
        {{ html()->radio($item->slug,$itemKey==$value, $itemKey)->id($item->slug."-".$itemKey)->class('form-check-input') }}
        {{ html()->label($itemLabel)->class('form-check-label')->for($item->slug.'-'.$itemKey) }}
    </div>
@endforeach
