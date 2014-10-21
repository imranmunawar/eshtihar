<?php

class SearchController extends BaseController {

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

	public function getSearch()
	{
		$catid = Input::get('catid');
		$search_keyword = Input::get('search_keyword');
		$search_price1 = Input::get('search_price1');
		$search_price2 = Input::get('search_price2');
		$location = Input::get('location');
		
		$view = View::make('search.list')->with('title' , 'Search List');
		$posters = DB::table('posters');
		$posters->select('posters.id', 'posters.title', 'posters.detail', 'posters.created_at', 'categories.category as catname', 'posters.price');
		if(trim($search_keyword)!=''){
			$posters->where('posters.title', 'LIKE', '%'.$search_keyword.'%');
			//$posters->orwhere('posters.detail', 'LIKE', '%'.$search_keyword.'%');		
		}
		if(trim($search_price1)!=''){
			$posters->where('posters.price', '>', $search_price1);
			$posters->where('posters.price', '<', $search_price2);		
		}
		if(trim($location)!=''){
			$posters->where('posters.city_id', '=', $location);
		}
		if(isset($catid) && $catid!=''){				
			$posters->where('category_id', 'REGEXP', '(^|,)'.$catid.'($|,)');
			$selCat = Category::find($catid);
			$view->catid = $catid;	
			$view->selCat = $selCat;
			if($selCat->parent_id==0){
				$view->parentId = $selCat->id;
			}else{
				$view->parentId = $selCat->parent_id;
			}								
		}
		$posters->join('categories', 'posters.category_id', '=', 'categories.id');
		$posters->orderby('posters.created_at','desc');
		$result = $posters->get();
		
		//print_r($result);
		//die;
		$view->posters = $result;
		$view->search_keyword = $search_keyword;
		$view->search_price1 = $search_price1;
		$view->search_price2 = $search_price2;
		if(isset($location)){
			$view->location = $location;
		}
		return $view;
	}
}
