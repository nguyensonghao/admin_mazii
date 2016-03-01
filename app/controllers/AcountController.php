<?php 

class AcountController extends BaseController {

	public function showLogin () {
		return View::make('login');
	}

	public function actionLogin () {
		$username = Input::get('username');
		$password = Input::get('password');
		if (!Input::has('username') || !Input::has('password')) {
			return Redirect::to('login')->with('result_login', -2);
		} else {
			if (Auth::attempt(array('username' => $username, 'password' => $password))) {
				return Redirect::to('home')->with('result_login', 1);
			} else {
				return Redirect::to('login')->with('result_login', -1);
			}	
		}
		
	}

	public function actionLogout () {
		Auth::logout();
		return Redirect::to('login')->with('result_logout', 1);
	}

}

?>