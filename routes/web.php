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

// Pages
Route::group([], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/activities', function () {
        return view('activities');
    })->name('activities');

    Route::get('/portfolio', function () {
        return view('portfolio');
    })->name('portfolio');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/voorwaarden', function () {
        return view('voorwaarden');
    })->name('voorwaarden');
});

// Auth routes
Auth::routes(['register' => false]);

// Admin panel routes
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'dashboardController@index')->name('dashboard.index');
});
