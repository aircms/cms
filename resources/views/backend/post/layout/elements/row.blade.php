<div class="mb-3 p-5 border bg-light">
    <div class="ele-container row">
        @foreach($layout as $element)
            @include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children']])
        @endforeach
    </div>
</div>
