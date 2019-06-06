<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {
    Route::group(['middleware' => 'jwt.auth'], function () {

        /* Client */
        Route::get('/client/list/{consultant_id}', 'Api\ClientController@index')->name('client.index');
        Route::post('/client', 'Api\ClientController@store')->name('client.store');
        Route::get('/client/{client_id}', 'Api\ClientController@show')->name('client.show');
        Route::put('/client/{client_id}', 'Api\ClientController@update')->name('client.update');
        Route::delete('/client/{client_id}', 'Api\ClientController@destroy')->name('client.destroy');
        /* Consultant */
        Route::resource('/consultant', 'Api\ConsultantController');
        /* Product */
        Route::get('/product/list/{consultant_id}', 'Api\ProductController@index')->name('product.index');
        Route::post('/product', 'Api\ProductController@store')->name('product.store');
        Route::get('/product/{product_id}', 'Api\ProductController@show')->name('product.show');
        Route::put('/product/{product_id}', 'Api\ProductController@update')->name('product.update');
        Route::delete('/product/{product_id}', 'Api\ProductController@destroy')->name('product.destroy');
        /* Catalogue */
        Route::get('/catalogue/list/{consultant_id}', 'Api\CatalogueController@index')->name('catalogue.index');
        Route::post('/catalogue', 'Api\CatalogueController@store')->name('catalogue.store');
        Route::get('/catalogue/{catalogue_id}', 'Api\CatalogueController@show')->name('catalogue.show');
        Route::put('/catalogue/{catalogue_id}', 'Api\CatalogueController@update')->name('catalogue.update');
        Route::delete('/catalogue/{catalogue_id}', 'Api\CatalogueController@destroy')->name('catalogue.destroy');
        /* Auth */
        Route::get('/token/refresh', 'Api\AuthController@refreshToken');
    });

    /* autenticação */
    Route::post('/auth/signin', 'Api\AuthController@authenticated');
    Route::post('/auth/signup', 'Api\AuthController@loginAuth');
    Route::get('/auth/user', 'Api\AuthController@getAuthenticatedUser');
});



