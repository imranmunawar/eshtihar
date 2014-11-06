<?php

class UserController extends BaseController {

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
		$view = View::make('user.index',array('name'=>'imran khan'))->with('age','28');	
		$view->location = 'Pakistan';
		$view['speciality'] = 'php';
		return $view;		
	}
	public function getManageAccount(){
		$view = View::make('user.manage-account',array('name'=>'imran khan'))->with('age','28');	
		$view->location = 'Pakistan';
		$view['speciality'] = 'php';
		return $view;		
	}	
	public function getLogin()
	{
		return View::make('user.login');
	}
	public function postLogin()
	{
        $validator = Validator::make(Input::all(), array(
					'email' => 'required|max:50|email',
					'password' => 'required'									
                ));	
       if ($validator->fails()) {
            return Redirect::route('login')
                            ->withErrors($validator)
                            ->withInput();		
		}else {
			
			$userType = Input::get('user_type');
			$password = Input::get('password');
			$email = Input::get('email');
			$activation_hash = str_random(60);
			if($userType==2){
                $userArray = array(
                    'email' => $email,
                    'password' => Hash::make($password),
                    'activation_hash' => $activation_hash,
                );
                $user = User::create($userArray);				
			}
			$user = User::where('email', '=', ''.Input::get('email').'')->get(array('email'));
			
            if ($user->count()) {
                $user = $user->first();
            	$auth = Auth::attempt(array('email' => Input::get('email'),'password' => Input::get('password')));	
				if($auth){
					return Redirect::route('createad');
				}else{
					$error = array('login_failed' => 'Please provide correct information');
                	return Redirect::route('login')
                                ->withErrors($error)
                                ->withInput();					
				}			
            }			
		}
	}
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }		
}
