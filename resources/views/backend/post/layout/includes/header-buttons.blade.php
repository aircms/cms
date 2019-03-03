<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
    <a href="{{ route('admin.post.layout.store',[$type->id,$layout->id]) }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.buttons.save')">
        <i class="fas fa-save"></i>
    </a>
</div>

<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
    <a href="{{ route('admin.post.layout.preview',[$type->id,$layout->id]) }}" class="btn btn-primary ml-1" data-toggle="tooltip" title="@lang('labels.backend.post.layout.preview')">
        <i class="fas fa-eye"></i>
    </a>
</div>
