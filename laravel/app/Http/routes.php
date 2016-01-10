<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('hello', 'HelloController@index');
Route::get('hello/{id}/{content?}', 'HelloController@hello');
Route::get('test/hello', function(){
	return 'test';
});
Route::controller('test/test', 'HelloController');

Route::resource('articles', 'ArticleController');

Route::get('lang/{lang}', function($lang){
	$available = ['en', 'th'];
	Session::put('locale', in_array($lang, $available)? $lang : Config::get('app.locale'));
	return redirect()->back();
});

Route::controller('pages', 'PagesController');
