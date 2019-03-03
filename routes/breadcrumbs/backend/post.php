<?php
// type management
Breadcrumbs::for('admin.post.type.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.post.type.management'), route('admin.post.type.index'));
});

Breadcrumbs::for('admin.post.type.create', function ($trail) {
    $trail->parent('admin.post.type.index');
    $trail->push(__('labels.general.create'), route('admin.post.type.create'));
});

Breadcrumbs::for('admin.post.type.edit', function ($trail, $id) {
    $trail->parent('admin.post.type.index');
    $trail->push(__('labels.general.update'), route('admin.post.type.edit', $id));
});


// field management
Breadcrumbs::for('admin.post.field.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.post.field.management'), route('admin.post.field.index'));
});

Breadcrumbs::for('admin.post.field.create', function ($trail) {
    $trail->parent('admin.post.field.index');
    $trail->push(__('labels.general.create'), route('admin.post.field.create'));
});

Breadcrumbs::for('admin.post.field.edit', function ($trail, $id) {
    $trail->parent('admin.post.field.index');
    $trail->push(__('labels.general.update'), route('admin.post.field.edit', $id));
});

// layout management
Breadcrumbs::for('admin.post.layout.index', function ($trail,$type) {
    $trail->parent('admin.post.type.index');
    $trail->push(__('labels.backend.post.layout.management'), route('admin.post.layout.index',$type));
});
