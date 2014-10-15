<?php

class CategoriesController extends BaseController {

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

	public function view($id)
	{
		$view = View::make('categories.view')->with('title' , 'Home');
		$posters = Poster::where('child_category','=',$id)
							->select('posters.id', 'posters.title', 'posters.detail', 'posters.created_at', 'categories.name as catname', 'posters.city', 'posters.price')
							->join('categories', 'posters.child_category', '=', 'categories.id')
							->orderby('posters.created_at','desc')
							->get();
		//print_r($posters);
		$view->posters = $posters;
		$view->catid = $id;
		return $view;
	}
}
