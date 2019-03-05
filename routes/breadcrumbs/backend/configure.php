<?php
Breadcrumbs::for('admin.setting.configure.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('strings.backend.setting.configure'), route('admin.setting.configure.index'));
});

Breadcrumbs::for('admin.setting.configure.category', function ($trail, $category) {
    $trail->parent('admin.setting.configure.index');

    $trail->push($category->name, route('admin.setting.configure.category', $category));
});

Breadcrumbs::for('admin.setting.item.index', function ($trail) {
    $trail->parent('admin.system.management');

    $trail->push(__('strings.backend.setting.item.management'), route('admin.setting.item.index'));
});

Breadcrumbs::for('admin.setting.item.create', function ($trail) {
    $trail->parent('admin.setting.item.index');

    $trail->push(__('labels.general.create'), route('admin.setting.item.create'));
});

Breadcrumbs::for('admin.setting.item.edit', function ($trail, $item) {
    $trail->parent('admin.setting.item.index');

    $trail->push(__('labels.general.update'), route('admin.setting.item.edit', $item));
});
