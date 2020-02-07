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

Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes();

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {

    Route::resource('billing','billingController');
    Route::resource('agency','agencyController');
    Route::resource('client','clientController');
    Route::resource('type','typeController');
    Route::get('typeReport','typeController@typeReport');

    Route::resource('user','userController');
    Route::resource('payment','PaymentController');
    Route::any('/depend','PaymentController@dependency')->name('depend');

    Route::get('/searchResult','reportController@result');
    Route::get('viewDetails/{id}','reportController@clientDetails');
    Route::get('viewAgentDetails/{id}','reportController@SingleAgentDetails');
    Route::get('viewClientReport','reportController@viewClientReport');
    Route::get('viewAgentReport','reportController@viewAgentReport');


});

