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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api\V1'], function () {
    Route::get('external-books', 'BooksController@externalSearch');
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1'], function () {
    Route::get('books/search',  'BooksController@search');
    Route::resource('books', 'BooksController');
});
