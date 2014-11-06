<?php

/**
 * This is general purpose class.
 * 
 */
class GeneralPurpose {

    
    /**
     * Calculate a time ago
     * 
     * @param datetime $time_ago
     * 
     * @return string 
     */
    public static function timeAgo($time_ago) {
        $time_ago = strtotime($time_ago);
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);

        if ($seconds <= 60) { // Seconds
            return $seconds . ' second ago';
        } else if ($minutes <= 60) { //Minutes
            if ($minutes == 1) {
                return trans('content.1_minute_ago');
            } else {
                return $minutes . ' minutes ago';
            }
        } else if ($hours <= 24) { //Hours
            if ($hours == 1) {
                return 'hour ago';
            } else {
                return $hours . ' hour ago';
            }
        } else if ($days <= 7) { //Days
            if ($days == 1) {
                return 'yesterday';
            } else {
                return $days . ' days ago';
            }
        } else if ($weeks <= 4.3) { //Weeks
            if ($weeks == 1) {
                return 'week ago';
            } else {
                return $weeks . ' weeks ago';
            }
        } else if ($months <= 12) { //Months
            if ($months == 1) {
                return 'month ago';
            } else {
                return $months . ' months ago';
            }
        } else { //Years
            if ($years == 1) {
                return 'year ago';
            } else {
                return $years . ' years ago';
            }
        }
    }	
	public static function getCity(){
		$ip = '182.189.82.18';
		$country=file_get_contents('http://api.hostip.info/get_html.php?ip='.$ip.'');
		$arr = explode('City: ',$country);;
		$arr = explode('IP: ',$arr[1]);	
		$city = City::where('city_name', 'LIKE', '%'.trim($arr[0]).'%')->get(array('id', 'city_name', 'state_id'));
		return $city;
	}
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