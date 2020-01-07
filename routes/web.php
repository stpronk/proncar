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

foreach(page_index() as $key => $page){
    Route::get($page['route']['url'], $page['route']['controller'].'@show')->name($key);

    Route::group(['middleware' => ['auth']], function () use ($page, $key){
        Route::get($page['route']['url'].'/edit', $page['route']['controller'].'@edit')->name($key.'.edit');
        Route::post($page['route']['url'].'/update', $page['route']['controller'].'@store')->name($key.'.store');
        Route::post($page['route']['url'].'/store', $page['route']['controller'].'@store')->name($key.'.store');
    });
};

Route::get('/generate', 'PagesController@generatePages')->name('generate');

// Auth routes
Auth::routes(['register' => true]);

Route::post('/contact', 'DashboardController@contact')->name('dashboard.contact');

// Admin panel routes
Route::group(['middleware' => 'auth'], function () {
    Route::post('/store', 'Api\ContentController@store')->name('content.store');
    Route::post('/publish', 'Api\ContentController@publish')->name('content.publish');
    Route::post('/advanced', 'Api\ContentController@getValueStoreData')->name('content.advanced');
    Route::post('/advanced/store', 'Api\ContentController@storeValueStoreData')->name('content.advanced.store');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');

        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', 'PagesController@index')->name('pages.index');
        });
    });
});
