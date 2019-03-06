<div class="row">
    @foreach($layout as $element)
        @include('backend.post.layout.elements.'.$element['type'], ['layout'=>$element['children'], 'post'=>$post])
    @endforeach
</div>
