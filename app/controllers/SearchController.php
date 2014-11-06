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
		$posters->select('posters.id', 'posters.title', 'posters.detail', 'posters.created_at', 'categories.category as catname', 'posters.price', 'posters.city_id','posters.category_id');
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
		$posters->join('categories', 'posters.category_id', '=', 'categories.id');		
		if(isset($catid) && $catid!=''){				
			$posters->where('posters.category_id', 'REGEXP', '(^|,)'.$catid.'($|,)');
			$selCat = Category::find($catid);
			$view->catid = $catid;	
			$view->selCat = $selCat;
			if($selCat->parent_id==0){
				$view->parentId = $selCat->id;
			}else{
				$view->parentId = $selCat->parent_id;
			}								
			
		}		
		$posters->groupby('posters.id');
		//$posters->orderby('posters.created_at','desc');
		if(isset($catid) && $catid!=''){
			$fields = CategoryField::where('category_id','=', $catid)->get();
			$posters->join('poster_options', 'posters.id', '=', 'poster_options.poster_id');
			$con = '';
			foreach($fields as $k => $field){
				$option = Input::get('option'.$field->id);
				//$view->option.$field->id = $option;
				if(isset($option) && $option!=''){
					$posters->havingRaw('sum(poster_options.field_option_val = "'.$option.'") > 0');
				}
			}					
			
		}
		$posters->paginate(5);
		$result = $posters->get();
		
		
		//$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$this->getRealIpAddr());
		//echo $xml->geoplugin_countryName ;
		//echo "<pre>" ;
		//foreach ($xml as $key => $value)
		//{
		//	echo $key , "= " , $value ,  " \n" ;
		//}		
		
		//die;
		// Reformat the data returned (Keep only country and country abbr.)
		//$only_country=explode (" ", $country);
		//echo "Country : ".$only_country[1]." ".substr($only_country[2],0,4);		
		
		//print_r($result);
		//die;
		$view->posters = $result;
		$view->search_keyword = $search_keyword;
		$view->search_price1 = $search_price1;
		$view->search_price2 = $search_price2;
		$view->search_price2 = $search_price2;
		$view->search_price2 = $search_price2;
		$view->search_price2 = $search_price2;
		
		
		if(isset($location)){
			$view->location = $location;
		}
		return $view;
	}
	function getRealIpAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}	
}
