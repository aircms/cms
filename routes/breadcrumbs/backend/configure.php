<?php
Breadcrumbs::for('admin.setting.configure.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('strings.backend.setting.configure'), route('admin.setting.configure.index'));
});

Breadcrumbs::for('admin.setting.configure.category', function ($trail, $category) {
    $trail->parent('admin.setting.configure.index');

    $trail->push($category->name, route('admin.setting.configure.category', $category));
});
