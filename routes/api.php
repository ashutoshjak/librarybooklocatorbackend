<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Request book start
Route::post('requestbook', 'RequestBookController@store');
Route::get('requestbooks', 'RequestBookController@index');
Route::post('updaterequestbook/{id}', 'RequestBookController@update');
Route::get('deleterequestbook/{id}', 'RequestBookController@destroy');
// request book end


//Login logout register start
Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
});

//Login logout register end

//Book start
Route::get('books', 'BookController@index');
Route::post('book', 'BookController@store');
Route::post('updatebook/{id}', 'BookController@update');
Route::get('deletebook/{id}', 'BookController@destroy');
//Book end


// rule
Route::get('rules', 'RuleController@index');
// 

// update
Route::get('updates', 'UpdateController@index');

// update


//map
Route::get('maps', 'MapController@index');
//map