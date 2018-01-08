<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function(){
    return view('backend.login');
});
Route::get('home', function () {
    return view('backend.index');
})->name('home');

Route::get('/', function () {
    return view('backend.index');
})->name('blog');


//--------------------------route-backend----------------------
Route::prefix('admin')->group(function () {
    Route::get('/dashboard','Backend\DashboardController@index')->name('dashboard.index');
    //categories
    Route::prefix('category')->group(function () {
        Route::get('/','Backend\CategoryController@index')->name('categories.index');
        Route::get('/create','Backend\CategoryController@createForm')->name('categories.create');
        Route::post('/create','Backend\CategoryController@processCreateForm')->name('categories.create');
        Route::get('/update/{id}','Backend\CategoryController@editForm')->name('categories.edit');
        Route::post('/update/{id}','Backend\CategoryController@processEditForm')->name('categories.edit');
        Route::get('/delete/{id}','Backend\CategoryController@delete')->name('categories.delete');
    });
    // news
    Route::prefix('news')->group(function () {
        Route::get('/','Backend\NewsController@index')->name('news.index');
        Route::get('/create','Backend\NewsController@createForm')->name('news.create');
        Route::post('/create','Backend\NewsController@processCreateForm')->name('news.create');
        Route::get('/update/{id}','Backend\NewsController@editForm')->name('news.edit');
        Route::post('/update/{id}','Backend\NewsController@processEditForm')->name('news.edit');
        Route::get('/delete/{id}','Backend\NewsController@delete')->name('news.delete');
    });
   //banner
   Route::prefix('banner')->group(function () {
      Route::get('/','Backend\BannerController@index')->name('banner.index');
      Route::get('/create','Backend\BannerController@createForm')->name('banner.create');
      Route::post('/create','Backend\BannerController@processCreateForm')->name('banner.create');
      Route::get('/update/{id}','Backend\BannerController@editForm')->name('banner.update');
      Route::post('/update/{id}','Backend\BannerController@processEditForm')->name('banner.update');
      Route::get('/delete/{id}','Backend\BannerController@delete')->name('banner.delete');
   });
       //banner
   Route::prefix('products')->group(function () {
       Route::get('/create','Backend\ProductController@createForm')->name('products.create');
   });
});