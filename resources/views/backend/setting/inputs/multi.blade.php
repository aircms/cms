@php
    $items = $item->getMeta('items',[]);
    $value = $item->getMeta('value',[]);
@endphp

@foreach($items as $itemKey=>$itemLabel)
    <div class="form-check form-check-inline">
        {{ html()->checkbox($item->slug.'[]',in_array($itemKey,$value), $itemKey)->id($item->slug."-".$itemKey)->class('form-check-input') }}
        {{ html()->label($itemLabel)->class('form-check-label')->for($item->slug.'-'.$itemKey) }}
    </div>
@endforeach
