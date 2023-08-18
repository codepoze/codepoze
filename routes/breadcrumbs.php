<?php

use App\Models\Product;
use App\Models\Type;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push('Product', route('products'));
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

    $trail->push('About Us', route('about'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push('Contact Us', route('contact'));
});

Breadcrumbs::for('sop', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push('Service Policy', route('sop'));
});

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.profil.profil', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Profil', route('admin.profil.profil'));
});

Breadcrumbs::for('admin.based.based', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Based', route('admin.based.based'));
});

Breadcrumbs::for('admin.stack.stack', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Stack', route('admin.stack.stack'));
});

Breadcrumbs::for('admin.type.type', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Type', route('admin.type.type'));
});

Breadcrumbs::for('admin.price.price', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Price', route('admin.price.price'));
});

Breadcrumbs::for('admin.product.product', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Product', route('admin.product.product'));
});

Breadcrumbs::for('admin.product.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.product');

    $trail->push('Add', route('admin.product.add'));
});

Breadcrumbs::for('admin.product.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.product');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('admin.product.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.product.product');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.project.project', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Project', route('admin.project.project'));
});

Breadcrumbs::for('admin.project.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.project');

    $trail->push('Add', route('admin.project.add'));
});

Breadcrumbs::for('admin.project.upd', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.project');

    $trail->push('Ubah', '#');
});

Breadcrumbs::for('admin.project.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.project');

    $trail->push('Detail', '#');
});

Breadcrumbs::for('admin.contact.contact', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Contact', route('admin.contact.contact'));
});
