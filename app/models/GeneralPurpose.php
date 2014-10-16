<?php

/**
 * This is general purpose class.
 * 
 */
class GeneralPurpose {

    /**
     * Get Cities of a Country
     * 
     * @param $country_id
     * 
     * @author Abdul Wahid
     * 
     * @return string 
     */
    public static function getCitiesOfState($state_id) {
        $cities = City::where('state_id', '=', $state_id)->orderBy('city_name')->get(array('id', 'city_name'));
        if (!is_null($cities->first())) {
            return Response::json(array(
                        'status' => 'success',
                        'cities' => $cities,
                    ));
        } else {
            return Response::json(array(
                        'status' => 'fail',
                        'cities' => '',
                    ));
        }
    }
	public static function getSecondLevel($id){
        $categories = Category::where('parent_id', '=', $id)->orderBy('category')->get(array('id', 'category'));
        if (!is_null($categories->first())) {
            return Response::json(array(
                        'status'     => 'success',
                        'categories' => $categories,
                    ));
        } else {
            return Response::json(array(
                        'status'     => 'fail',
                        'categories' => '',
                    ));
        }		
	}
	public static function getThirdLevel($id){
        $categories = Category::where('parent_id', '=', $id)->orderBy('category')->get(array('id', 'category', 'parent_id'));
		//print_r($categories->first()->parent_id);
        if (!is_null($categories->first())) {
            return Response::json(array(
                        'status' => 'success',
                        'categories' => $categories,
                    ));
        } else {
            return Response::json(array(
                        'status' => 'fail',
                        'categories' => '',					
                    ));
        }		
	}
	public static function getFourLevel($id){
        $categories = Category::where('parent_id', '=', $id)->orderBy('category')->get(array('id', 'category', 'parent_id'));
		//print_r($categories->first()->parent_id);
        if (!is_null($categories->first())) {
            return Response::json(array(
                        'status' => 'success',
                        'categories' => $categories,
                    ));
        } else {
            return Response::json(array(
                        'status' => 'fail',
                        'categories' => '',
                    ));
        }		
	}		

}