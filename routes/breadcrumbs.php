<?php

use App\Models\Product;
use App\Models\Type;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// begin:: pages
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('menu.home'), route('home'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.product'), route('products'));
});

Breadcrumbs::for('products.type', function (BreadcrumbTrail $trail, Type $type) {
    $trail->parent('products');

    $trail->push(ucfirst($type->singkatan), route('products.type', $type->singkatan));
});

Breadcrumbs::for('products.detail', function (BreadcrumbTrail $trail, Type $type, Product $product) {
    $trail->parent('products.type', $type);

    $trail->push('Detail', route('products.detail', ['slug' => $type->singkatan, 'id' => $product->id_product]));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.about'), route('about'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.contact'), route('contact'));
});

Breadcrumbs::for('sop', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.sop'), route('sop'));
});

Breadcrumbs::for('testimonies', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(__('menu.testimony'), route('testimonies'));
});
// end:: pages

// begin:: admin
Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.profil.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Profil', route('admin.profil.index'));
});

Breadcrumbs::for('admin.based.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Based', route('admin.based.index'));
});

Breadcrumbs::for('admin.stack.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Stack', route('admin.stack.index'));
});

Breadcrumbs::for('admin.type.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Type', route('admin.type.index'));
});

Breadcrumbs::for('admin.price.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Price', route('admin.price.index'));
});

Breadcrumbs::for('admin.social_media.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Social Media', route('admin.social_media.index'));
});

Breadcrumbs::for('admin.product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Product', route('admin.product.index'));
});

Breadcrumbs::for('admin.product.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.index');

    $trail->push('Add', route('admin.product.add'));
});

Breadcrumbs::for('admin.product.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.index');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('admin.product.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.project.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Project', route('admin.project.index'));
});

Breadcrumbs::for('admin.project.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.index');

    $trail->push('Add', route('admin.project.add'));
});

Breadcrumbs::for('admin.project.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.index');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('admin.project.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Contact', route('admin.contact.index'));
});

Breadcrumbs::for('admin.contact.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.contact.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.testimony.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Testimony', route('admin.testimony.index'));
});

Breadcrumbs::for('admin.testimony.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.testimony.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.visitor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Visitor', route('admin.visitor.index'));
});

Breadcrumbs::for('admin.notification.index', function ($trail) {
    $trail->parent('admin.dashboard.index');

    $trail->push('Notification');
});
// end:: admin
