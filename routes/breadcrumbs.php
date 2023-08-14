<?php

use App\Models\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.profil', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Profil', route('admin.profil'));
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

Breadcrumbs::for('admin.project.project', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');

    $trail->push('Project', route('admin.project.project'));
});

Breadcrumbs::for('admin.project.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.project');

    $trail->push('Add', route('admin.project.add'));
});

Breadcrumbs::for('admin.project.det', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.project.project');

    $trail->push('Detail', '#');
});





























// Breadcrumbs::for('admin.project.upd', function (BreadcrumbTrail $trail, Project $post) {
//     $trail->parent('admin.project');

//     $trail->push('Ubah', route('admin.project.upd', $post->id_project));
// });
