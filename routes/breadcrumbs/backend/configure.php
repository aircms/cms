<?php
Breadcrumbs::for('admin.setting.configure.root', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('strings.backend.setting.configure'));
});

Breadcrumbs::for('admin.setting.configure.category', function ($trail, $category) {
    $trail->parent('admin.setting.configure.root');

    $trail->push($category->name, route('admin.setting.configure.category', $category));
});
