<?php
// contact
Breadcrumbs::for('admin.utils.contact.replied', function ($trail) {
    $trail->parent('admin.utils');
    $trail->push(__('labels.backend.contact.replied'), route('admin.utils.contact.replied'));
});

Breadcrumbs::for('admin.utils.contact.waiting', function ($trail) {
    $trail->parent('admin.utils');
    $trail->push(__('labels.backend.contact.waiting_for_reply'), route('admin.utils.contact.waiting'));
});

Breadcrumbs::for('admin.utils.contact.create', function ($trail) {
    $trail->parent('admin.utils.contact.waiting');

    $trail->push(__('labels.general.create'), route('admin.utils.contact.create'));
});

Breadcrumbs::for('admin.utils.contact.reply', function ($trail, $contact) {
    $trail->parent('admin.utils.contact.waiting');

    $trail->push(__('labels.general.reply'), route('admin.utils.contact.reply', $contact));
});

Breadcrumbs::for('admin.utils.contact.show', function ($trail, $contact) {
    $trail->parent('admin.utils.contact.replied');

    $trail->push(__('labels.general.show'), route('admin.utils.contact.show', $contact));
});
