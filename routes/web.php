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


// admin part
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

// resources part
Route::resource('/zone', 'ZoneController', ['except' => 'destroy',]);
Route::resource('/category', 'CategoryController', ['excepy' => 'destroy',]);
Route::resource('/tenant', 'TenantController', ['excepy' => 'destroy',]);

// front end
Route::get('/', 'FrontEndController@index') -> name('frontend.index');
Route::get('/frontend', 'FrontEndController@navigation') -> name('frontend.navigation');
Route::get('/frontend/categories', 'FrontEndController@categories') -> name('frontend.categories');
Route::get('/frontend/categories/{categoryName}/{id}', 'FrontEndController@categoryDetail') -> name('frontend.categories.detail');

Route::get('/frontend/searchAll/{id}', 'FrontEndController@viewTenants')->name('frontend.searchAll');

Route::get('/frontend/mapView/{floor_id}', 'FrontEndController@mapView')->name('frontend.mapView');
Route::get('/frontend/mapView/{floor_id}/{id}', 'FrontEndController@zoneDetail') -> name('frontend.mapView.detail');

// Testing
Route::get('/frontend/clearing/{previousPage}', 'FrontEndController@clearSession')->name('frontend.clearing.clearSession');
