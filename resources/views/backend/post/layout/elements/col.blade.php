<div class="ele-container col ">
    <div class="p-5 border bg-info">
        @foreach($layout as $element)
            @include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children']])
        @endforeach
    </div>
</div>
