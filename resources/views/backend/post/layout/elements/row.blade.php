<div class="row">
    @foreach($layout as $element)
        @include('backend.post.layout.elements.'.$element['type'], [
            'layout'=>$element['children'],
            'size'=>array_get($element,'size'),
            'post'=>$post
         ])
    @endforeach
</div>
