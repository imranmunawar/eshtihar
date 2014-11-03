<?php

class PosterController extends BaseController {

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

	public function getCreatead()
	{
		$view = View::make('poster.createad')->with('title' , 'Post a free ad');
		$mainCats = Category::where('parent_id','0')->orderby('order','asc')->get();
		//echo $country;
		
		$states = array('' => 'Select State') + State::lists('state_name', 'id');
		$cities = array('' => 'Select City');

		$view->mainCategories = $mainCats;
		$view->states = $states;
		$view->cities = $cities;
		
		return $view;
	}
	public function postCreatead(){
		
        $validator = Validator::make(Input::all(), array(
                    'firstlevel' => 'required|max:10',
                    'secondlevel' => 'required|max:4',
					'ad_title' => 'required|min:5',
					'ad_text' => 'required|min:50',
					'ad_price' => 'required',
					'states' => 'required',
					'cities' => 'required',
					'ad_uname' => 'required|max:30|min:5',
					'ad_uemail' => 'required|max:50|email',
					'ad_uphone' => 'required|max:20|min:5'									
                ));	
		if ($validator->fails()) {
            return Redirect::route('createad')
                            ->withErrors($validator)
                            ->withInput();		
		}else{
			$firstLevel  = Input::get('firstlevel');
			$secondLevel = Input::get('secondlevel');
			$thirdLevel  = Input::get('thirdlevel');
			$fourLevel   = Input::get('fourlevel');
			
			if($firstLevel!='' && $secondLevel!=''){
				$category = $firstLevel.','.$secondLevel;
			}
			if($thirdLevel!=''){
				$category = $category.','.$thirdLevel;
			}
			if($fourLevel!=''){
				$category = $category.','.$fourLevel;
			}			
			
			$title  = Input::get('ad_title');
			$detail = Input::get('ad_text');
			$price  = Input::get('ad_price');				
			$adtype = Input::get('ad_type');
			$uname  = Input::get('ad_uname');
			$uemail = Input::get('ad_uemail');
			$uphone = Input::get('ad_uphone');
			$state  = Input::get('states');
			$city   = Input::get('cities');			
			$utype  = Input::get('user_type');

			$postArray = array(
				'category_id' => $category,
				'title' => $title,
				'detail' => $detail,
				'price' => $price,
				'adtype' => $adtype,
				'state_id' => $state,
				'city_id' => $city,
				'seller_name' => $uname,
				'seller_email' => $uemail,
				'seller_phone' => $uphone,
				'seller_type' => $utype,
				'created_at' => time(),
				'updated_at' => time()																												
			);			
			//DB::insert('insert into users (id, name) values (?, ?)', array(1, 'Dayle'));
			$poster = Poster::create($postArray);	

			$catFields  = CategoryField::where('category_id', '=', $secondLevel)->orderBy('field_label')->get(array('id', 'field_label', 'field_type', 'field_value'));				
			foreach($catFields as $field){
				$fieldVal  = Input::get('option'.$field->id);
				if(isset($fieldVal) && $fieldVal!=''){
					$optArray = array(
									'category_id' => $secondLevel,
									'field_option_id' => $field->id,
									'poster_id' => $poster->id,
									'field_option_val' => $fieldVal,																										
								);
					PosterOption::create($optArray);					
				}				
			}

            /////upload images////
            if (!empty($_FILES)) {
                $j = 0;     // Variable for indexing uploaded image.
                $target_path = Config::get('mediaPaths.poster')."";     // Declaring Path for uploaded images.
				
                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
 
                    $validextensions = array("jpeg", "jpg", "png", "wmv");      // Extensions which are allowed.
                    $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
                    $file_extension = end($ext); // Store extensions in the variable.
                    $fileName = basename($_FILES['file']['name'][$i]);
                    $extractFileExtension = explode('.', $fileName);
                    $nameOfFile = md5(uniqid()) . '-' . strtotime("now") . '-' . $extractFileExtension[0] . '.' . $extractFileExtension[1];
                    
                    $target_file_path = $target_path . $nameOfFile;
                    $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
                    if (($_FILES["file"]["size"][$i] < 10000000)     // Approx. 100kb files can be uploaded.
                            && in_array($file_extension, $validextensions)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_file_path)) {

// If file moved to uploads folder.
                            $mediaArray = array(
                                'poster_id' => $poster->id,
                                'upload' => $nameOfFile,
								'created_at' => time(),
								'updated_at' => time(),
                            );
                            MediaResource::create($mediaArray);

                        } else {     //  If File Was Not Moved.
                            return Response::json(array(
                                        'status' => 'fail',
                                        'msg' => trans('messages.image_is_not_uploaded_please_try_again'),
                                    ));
                        }
                    } else {     //   If File Size And File Type Was Incorrect.

                    }
                }
            }				
																							
			return Redirect::route('createad')->with('global', 'Eshtihar successfully added');			
		}
	}
	public function getAttributes($id)
	{
		$catFields  = CategoryField::where('category_id', '=', $id)->orderBy('field_label')->get(array('id', 'field_label', 'field_type', 'field_value'));
		$view = View::make('poster.attribes')->with('title' , 'Post a free ad');
		$view->fields = $catFields;
		return $view;

	}	
	public function getList(){
		$view = View::make('poster.list')->with('title' , 'Post a free ad');
	}	
	public function getDetail($id)
	{
		$poster  = Poster::where('id', '=', $id)->get(array('id', 'title', 'detail', 'price', 'seller_name', 'seller_phone', 'seller_email', 'created_at', 'updated_at', 'city_id', 'user_id'));									
	
		$view = View::make('poster.detail')->with('title' , 'Post a free ad');
		$view->poster = $poster;
		$view->id = $id;
		return $view;
	}
	public function postDetail($id)
	{	$id = Input::get('pid');							
		$poster  = Poster::where('id', '=', $id)->get(array('id', 'title', 'seller_name','seller_email', 'user_id'));	
		$email = Input::get('email');
		$messge = Input::get('message');
		if(trim($email)!='' && trim($messge)!=''){
			$validator = Validator::make(Input::all(), array(
						'message' => 'required|min:20',
						'email' => 'required|max:50|email',
					));	
			if($validator->fails()) {
				return Redirect::route('poster-detail')
								->withErrors($validator)
								->withInput();		
			}else{
					$data = array('title' => $poster[0]->title, 'username' => $poster[0]->seller_name);				
                    Mail::send('emails.poster.message', $data, 
								function($message) use ($poster) {
                                	//$message->from($email, 'eshtihar.com user'));
									$message->to($poster[0]->seller_email, $poster[0]->seller_name)->subject('You have new message about your Ad: "'.$poster[0]->title.'"');
                            	}
							   );
					return Redirect::route('poster-detail',$id)->with('message_success', 'You message has been sent successfully!');	
			
			}
		}
	}		
}
