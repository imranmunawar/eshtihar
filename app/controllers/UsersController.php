<?php

class UsersController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function index(){
		$view = View::make('users.index',array('name'=>'imran khan'))->with('age','28');	
		$view->location = 'Pakistan';
		$view['speciality'] = 'php';
		return $view;		
	}
	public function showWelcome()
	{
		return View::make('users.index');
	}

}
