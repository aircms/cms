<?php
require __DIR__ . '/utils/contact.php';

Breadcrumbs::for('admin.utils', function ($trail) {
    $trail->push(__('strings.backend.utils.title'));
});

