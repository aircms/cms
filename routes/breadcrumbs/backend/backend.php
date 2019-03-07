<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';
require __DIR__ . '/category.php';
require __DIR__ . '/post.php';
require __DIR__ . '/utils.php';
require __DIR__ . '/configure.php';
//require __DIR__ . '/page.php';
