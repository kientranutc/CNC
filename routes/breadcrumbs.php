<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('dashboard.index'));
});
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
   $breadcrumbs->parent('home');
   $breadcrumbs->push('control page', route('dashboard.index'));
});
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('danh mục', route('categories.index'));
});
Breadcrumbs::register('categories-create', function ($breadcrumbs) {
        $breadcrumbs->parent('categories');
        $breadcrumbs->push('Thêm mới','');
});


?>