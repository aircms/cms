@foreach(config('layouts.default.includes') as $item)
    @include($item)
@endforeach

<div class="row">
    <div class="col">
        @include('includes.post.field.checkbox',config('layouts.default.fields.can'))
    </div>
    <div class="col">
        @include('includes.post.field.checkbox_list',config('layouts.default.fields.items'))
    </div>
    <div class="col">
        @include('includes.post.field.radio_list',config('layouts.default.fields.status'))
    </div>
</div>

<div>
    @include('includes.post.field.input',config('layouts.default.fields.keywords'))
</div>

<div>
    @include('includes.post.field.textarea',config('layouts.default.fields.description'))
</div>

<div class="row mt-4">
    <div class="col">
        @include('includes.post.field.ueditor',config('layouts.default.fields.content'))
    </div>
</div>

