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
    return view('welcome');
});

Auth::routes();

Route::get(
	'/home', 
	'HomeController@index'
)->name('home');

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

Route::as('pages.')
	->group(function(){
		Route::get(
			'/about-us', 
			'PageController@aboutUs'
		)->name('about_us');

		Route::get(
			'/contact-us', 
			'PageController@contactUs'
		)->name('contact_us');
	});


Route::get(
	'account/activate/{token}', 
	'Auth\ActivationController@activate'
)->name('account.activate');

Route::get(
    'account/activation/request',
    'Auth\ActivationController@request'
)->name('account.activation.request');

Route::post(
    'account/resend/activation',
    'Auth\ActivationController@resend'
)->name('account.activation.resend');





