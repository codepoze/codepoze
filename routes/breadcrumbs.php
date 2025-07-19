<?php

use App\Models\Product;
use App\Models\Type;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Route;

// begin:: pages
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('menu.home'), route('home'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail, Type $type = null) {
    if ($type) {
        $trail->parent('home');

        $trail->push(__('menu.product'), route('products'));

        $trail->push(ucfirst($type->singkatan), '#');
    } else {
        $trail->parent('home');

        $trail->push(__('menu.product'), route('products'));
    }
});

Breadcrumbs::for('products.detail', function (BreadcrumbTrail $trail, Type $type) {
    $trail->parent('products');

    $trail->push(ucfirst($type->singkatan), route('products', $type->singkatan));

    $trail->push('Detail', '#');
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
Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('profil.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Profil', route('profil.index'));
});

Breadcrumbs::for('based.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Based', route('based.index'));
});

Breadcrumbs::for('stack.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Stack', route('stack.index'));
});

Breadcrumbs::for('type.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Type', route('type.index'));
});

Breadcrumbs::for('price.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Price', route('price.index'));
});

Breadcrumbs::for('social_media.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Social Media', route('social_media.index'));
});

Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Product', route('product.index'));
});

Breadcrumbs::for('product.add', function (BreadcrumbTrail $trail) {
    $trail->parent('product.index');

    $trail->push('Add', route('product.add'));
});

Breadcrumbs::for('product.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('product.index');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('product.det', function (BreadcrumbTrail $trail) {
    $trail->parent('product.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Project', route('project.index'));
});

Breadcrumbs::for('project.add', function (BreadcrumbTrail $trail) {
    $trail->parent('project.index');

    $trail->push('Add', route('project.add'));
});

Breadcrumbs::for('project.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('project.index');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('project.det', function (BreadcrumbTrail $trail) {
    $trail->parent('project.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Contact', route('contact.index'));
});

Breadcrumbs::for('contact.det', function (BreadcrumbTrail $trail) {
    $trail->parent('contact.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('testimony.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Testimony', route('testimony.index'));
});

Breadcrumbs::for('testimony.det', function (BreadcrumbTrail $trail) {
    $trail->parent('testimony.index');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('visitor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.index');

    $trail->push('Visitor', route('visitor.index'));
});

Breadcrumbs::for('notification.index', function ($trail) {
    $trail->parent('dashboard.index');

    $trail->push('Notification');
});
// end:: admin
