<?php

Breadcrumbs::for('admin.finder.dir', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push("文件管理");
});
