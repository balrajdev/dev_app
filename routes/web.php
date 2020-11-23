<?php

use Illuminate\Support\Facades\Route;

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




Route::group(['middleware' => 'usersessionauthenticate'], function () {

	Route::get('/', function () {
    return view('login');
});

//login Controller
Route::post('/login','UserAuthController@login');

//Register page
Route::get('/register', function () { return view('register'); });

//Register Controller
Route::post('/register/create','UserAuthController@register');

//Password Reset page
Route::get('/forgetpassword', function () { return view('forgetpassword'); });
//Reset Password Controller
Route::post('/resetpassword','UserAuthController@resetpassword');

});

//session restriction	
Route::group(['middleware' => 'usersession'], function () {
	
//Developers Controller
Route::resource('developers','DeveloperController');


//Developers Controller
Route::post('/developers/multipledelete','DeveloperController@multipledelete');

//Logout Controller
Route::get('/logout','UserAuthController@logout');


	});