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
		$catid = Input::get('catid');
		if($catid){$id=$catid;}
		$view  = View::make('categories.view')->with('title' , 'Home');
		$posters = Poster::where('category_id','REGEXP', '(^|,)'.$id.'($|,)')
							->select('posters.id', 'posters.title', 'posters.detail', 'posters.created_at', 'categories.category as catname', 'posters.price')
							->join('categories', 'posters.category_id', '=', 'categories.id')
							->orderby('posters.created_at','desc')
							->get();
		//print_r($posters);
		$view->posters = $posters;
		$view->catid = $id;
		return $view;
	}
}
