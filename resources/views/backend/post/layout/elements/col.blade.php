<div class="col{{ !empty($size)?"-".$size:"" }}">
    @foreach($layout as $element)
        @include('backend.post.layout.elements.'.$element['type'], [
            'layout'=>$element['children'],
            'post'=>$post,
            'size'=>array_get($element,'size')
         ])
    @endforeach
</div>

