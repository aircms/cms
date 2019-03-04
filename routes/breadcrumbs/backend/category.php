<?php

Breadcrumbs::for('admin.system.management', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.system.setting'));
});

Breadcrumbs::for('admin.category.group.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.category.group.management'), route('admin.category.group.index'));
});


Breadcrumbs::for('admin.category.group.create', function ($trail) {
    $trail->parent('admin.category.group.index');
    $trail->push(__('labels.general.create'), route('admin.category.group.create'));
});

Breadcrumbs::for('admin.category.group.edit', function ($trail, $id) {
    $trail->parent('admin.category.group.index');
    $trail->push(__('labels.general.update'), route('admin.category.group.edit', $id));
});


Breadcrumbs::for('admin.category.children.index', function ($trail, $ancestor) {
    $trail->parent('admin.category.group.index', $ancestor);
    $trail->push(__('labels.backend.category.children.management'), route('admin.category.children.index', $ancestor));
});

Breadcrumbs::for('admin.category.children.create', function ($trail, $ancestor) {
    $trail->parent('admin.category.children.index', $ancestor);
    $trail->push(__('labels.general.create'), route('admin.category.children.create', $ancestor));
});

Breadcrumbs::for('admin.category.children.edit', function ($trail, $ancestor, $category) {
    $trail->parent('admin.category.children.index', $ancestor);
    $trail->push(__('labels.general.update'), route('admin.category.children.edit', [$ancestor, $category]));
});

Breadcrumbs::for('admin.category.children.create.child', function ($trail, $ancestor, $parent) {
    $trail->parent('admin.category.children.index', $ancestor);
    $trail->push(__('labels.general.create'), route('admin.category.children.create.child', [$ancestor, $parent]));
});

