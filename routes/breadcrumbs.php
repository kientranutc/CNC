<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('dashboard.index'));
});
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
   $breadcrumbs->parent('home');
   $breadcrumbs->push('control page', route('dashboard.index'));
});

// categories
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('danh mục', route('categories.index'));
});
//add-categories
Breadcrumbs::register('categories-create', function ($breadcrumbs) {
        $breadcrumbs->parent('categories');
        $breadcrumbs->push('Thêm mới','');
});
//edit-categories
Breadcrumbs::register('categories-update', function ($breadcrumbs) {
        $breadcrumbs->parent('categories');
        $breadcrumbs->push('sửa danh mục','');
});
// news
Breadcrumbs::register('news', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tin tức', route('news.index'));
});
//add-categories
Breadcrumbs::register('news-create', function ($breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('Thêm mới','');
});
Breadcrumbs::register('news-update', function ($breadcrumbs) {
   $breadcrumbs->parent('news');
   $breadcrumbs->push('Sửa','');
});

//banner
Breadcrumbs::register('banner', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Banner', route('banner.index'));
});
Breadcrumbs::register('banner-create', function ($breadcrumbs) {
    $breadcrumbs->parent('banner');
    $breadcrumbs->push('Thêm mới','');
});
Breadcrumbs::register('banner-update', function ($breadcrumbs) {
   $breadcrumbs->parent('banner');
   $breadcrumbs->push('sửa','');
});
?>