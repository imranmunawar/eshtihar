<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));
Route::get('users',array('as'=>'user-index','uses'=>'usersController@index'));
Route::get('categories',array('as'=>'categories','uses'=>'categoriesController@index'));
Route::get('category/{id}',array('as'=>'category','uses'=>'categoriesController@view'));
Route::get('poster',array('as'=>'post','uses'=>'posterController@index'));

Route::group(array('before' => 'guest'), function() {
	/*
	 * CSRF protection group
	 */
	Route::group(array('before' => 'csrf'), function() {
		
		 /*
		 * create account (POST)
		 */
		Route::post('/poster/createad', array(
			'as' => 'createad',
			'uses' => 'PosterController@postCreatead'
		));
		/*
		 * Get cities of country (GET)
		 */
		 Route::post('/search/result', array(
			'as' => 'search',
			'uses' => 'SearchController@getSearch'
		 ));		 
		
	 });
	/*
	 * create eshtihar (GEt)
	 */	 
	 Route::get('/poster/createad', array(
		'as' => 'createad',
		'uses' => 'PosterController@getCreatead'
	 ));
	Route::get('/get-cities-of-state/{state_id}', function($state_id) {
				return GeneralPurpose::getCitiesOfState($state_id);
	});	 
	Route::get('/get-second-level/{id}', function($id) {
				return GeneralPurpose::getSecondLevel($id);
	});	
	Route::get('/get-third-level/{id}', function($id) {
				return GeneralPurpose::getThirdLevel($id);
	});	
	Route::get('/get-four-level/{id}', function($id) {
				return GeneralPurpose::getFourLevel($id);
	});	
	Route::get('/poster/attributes/{id}', array(
			   'as' => 'attribes',
		       'uses' => 'PosterController@getAttributes'
	 ));
	 Route::get('/search/', array(
		'as' => 'search',
		'uses' => 'SearchController@getSearch'
	 ));	 		
});