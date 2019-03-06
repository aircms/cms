@php
@dump($layout);
    $field =  \App\Models\Post\Type\Field::whereSlug($layout)->first();
@endphp

@include('includes.post.field.'.$field->type, $field->getConfigure())
