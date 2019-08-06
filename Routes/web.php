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

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace' => '\Modules\Description\Http\Controllers',
], function () {
    CRUD::resource('description', 'DescriptionController')->with(function () {
        Route::get('description/watch', 'DescriptionController@watch')->name('crud.description.watch');
    });
});
