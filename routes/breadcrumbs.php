<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});
Breadcrumbs::register('blog', function ($breadcrumbs) {
   $breadcrumbs->parent('home');
   $breadcrumbs->push('control page', route('blog'));
});

?>