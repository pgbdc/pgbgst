<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*Route::get('/gstcustomer',function() {
	              return view('gstviews/gstcustomer');
				  });*/
	


Route::get('utils/getgsthsnlist','gst\utils\gethsn@index');

Route::get('utils/getgstsaclist','gst\utils\getsac@index');

Route::get('utils/getgstnvendorlist','gst\utils\getgstn@vendor');
Route::get('utils/getgstncustomerlist','gst\utils\getgstn@customer');

Route::group(['middleware' => ['web']], function () {
    

Route::get('/gstvendor','gst\gstvendorcontroller@index');
Route::post('/gstvendor','gst\gstvendorcontroller@create');

Route::get('/gstcustomer','gst\gstcustomercontroller@index');
Route::post('/gstcustomer','gst\gstcustomercontroller@create');
	
	Route::get('/vendortxn','gst\vendortxncontroller@index');
	Route::post('/vendortxn','gst\vendortxncontroller@create');
	
	Route::get('/customertxn','gst\customertxncontroller@index');
	Route::post('/customertxn','gst\customertxncontroller@create');
	

	
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
