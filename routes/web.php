<?php
use App\Http\Controllers\Controller;
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

Route::get('/', 'PageController@home' );

Route::get('/services', 'PageController@services' );

Route::get('/contact', 'PageController@contact' );

Route::get('page/{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);

    Route::get('article/{page}/{subs?}', ['uses' => 'PageController@articulo'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);


    Route::get('service/{page}/{subs?}', ['uses' => 'PageController@service'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);


    Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
        // Backpack\NewsCRUD
        CRUD::resource('article', 'ArticleCrudController');
        CRUD::resource('page', 'PageCrudController');
        CRUD::resource('category', 'CategoryCrudController');
        CRUD::resource('tag', 'TagCrudController');
    });


    Route::get('clear', function() {

        Artisan::call('cache:clear');
        Artisan::call('route:clear'); 
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        return "Cleared!";
        
        });