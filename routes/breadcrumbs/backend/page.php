<?php

Breadcrumbs::for('admin.pages.root', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.page.root'));
});

Breadcrumbs::for('admin.pages.page.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.page.management'), route('admin.pages.page.index'));
});


Breadcrumbs::for('admin.pages.page.create', function ($trail) {
    $trail->parent('admin.pages.page.index');
    $trail->push(__('labels.general.create'), route('admin.pages.page.create'));
});

Breadcrumbs::for('admin.pages.page.edit', function ($trail, $id) {
    $trail->parent('admin.pages.page.index');
    $trail->push(__('labels.general.update'), route('admin.page.edit', $id));
});


Breadcrumbs::for('admin.pages.fragment.index', function ($trail) {
    $trail->parent('admin.system.management');
    $trail->push(__('labels.backend.fragment.management'), route('admin.pages.fragment.index'));
});


Breadcrumbs::for('admin.pages.fragment.create', function ($trail) {
    $trail->parent('admin.pages.fragment.index');
    $trail->push(__('labels.general.create'), route('admin.pages.fragment.create'));
});

Breadcrumbs::for('admin.pages.fragment.edit', function ($trail, $id) {
    $trail->parent('admin.pages.fragment.index');
    $trail->push(__('labels.general.update'), route('admin.fragment.edit', $id));
});

