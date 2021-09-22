<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/admin', function () {
//     return view('auth.login');
// });


// Route::get('login', function () {
//     return view('adminpanel.login');
// });

// Route::get('register', function () {
//     return view('adminpanel.register');
// });



//book start
Route::post('post-book-form','Web\BookContro@store');
Route::get('create-book','Web\BookContro@create');
Route::get('all-books','Web\BookContro@index');
Route::get('edit-book/{id}','Web\BookContro@edit');
Route::post('update-book/{id}','Web\BookContro@update');
// soft delete
Route::get('delete-book/{id}','Web\BookContro@destroy');
// force delete
Route::get('force-delete-book/{id}','Web\BookContro@forcedelete');
//book end

//map start

Route::post('post-map-form','Web\MapContro@store');
Route::get('create-map','Web\MapContro@create');
Route::get('all-maps','Web\MapContro@index');
Route::get('edit-map/{id}','Web\MapContro@edit');
Route::post('update-map/{id}','Web\MapContro@update');
// soft delete
Route::get('delete-map/{id}','Web\MapContro@destroy');
// force delete
Route::get('force-delete-map/{id}','Web\MapContro@forcedelete');
//map end



//requestbook start
Route::get('all-requestbooks','Web\RequestBookContro@index');
Route::get('edit-requestbook/{id}','Web\RequestBookContro@edit');
Route::post('update-requestbook/{id}','Web\RequestBookContro@update');
// soft delete
Route::get('delete-requestbook/{id}','Web\RequestBookContro@destroy');
// force delete
Route::get('force-delete-requestbook/{id}','Web\RequestBookContro@forcedelete');
//requestbook end


//user start
Route::get('all-users','Web\UserContro@index');
// Route::get('edit-user/{id}','Web\UserContro@edit');
// Route::post('update-user/{id}','Web\UserContro@update');
 Route::get('delete-user/{id}','Web\UserContro@destroy');
 // soft delete
// Route::get('soft-delete-user/{id}','Web\UserContro@softdelete');
//user end


//rule start
Route::get('create-rule','Web\RuleContro@create');
Route::post('post-rule-form','Web\RuleContro@store');
Route::get('all-rules','Web\RuleContro@index');
Route::get('edit-rule/{id}','Web\RuleContro@edit');
Route::post('update-rule/{id}','Web\RuleContro@update');
//soft delete
Route::get('delete-rule/{id}','Web\RuleContro@destroy');
// force delete
Route::get('force-delete-rule/{id}','Web\RuleContro@forcedelete');
// Route::get('restore-deleted-rule/{id}','Web\RuleContro@restore');
// rule end

// update start

Route::post('post-update-form','Web\UpdateContro@store');
Route::get('create-update','Web\UpdateContro@create');
Route::get('all-updates','Web\UpdateContro@index');
Route::get('edit-update/{id}','Web\UpdateContro@edit');
Route::post('update-update/{id}','Web\UpdateContro@update');
//soft delete
Route::get('delete-update/{id}','Web\UpdateContro@destroy');
// force delete
Route::get('force-delete-update/{id}','Web\UpdateContro@forcedelete');

// update end

// route
Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/dashboard' ,'DashboardController@index')->name('dashboard');
});
Route::get('/home', 'HomeController@index')->name('home');
