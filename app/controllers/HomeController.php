<?php

class HomeController extends BaseController {

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

	public function index()
	{
		$view = View::make('home.index')->with('title' , 'Home');
		$mainCats = Category::where('parent_id','0')->orderby('order','asc')->get();
		$posters = Poster::where('spotlight','1')->orderby('id','desc')->get();		
		//print_r($mainCats);
		//exit;
		$catArr = array();
		foreach($mainCats as $cat){
			$childCats = Category::where('parent_id','=',$cat->id)->get();			

			$catArr[$cat->id] = $cat;
			if(!$childCats->isEmpty()){
				$catArr[$cat->id]['sub'] = $childCats;		
			}
		}
		//print_r($catArr);
		$view->categories = $catArr;
		$view->posters = $posters;
		return $view;
	}
}
