<?php 

class ManagerAcountController extends BaseController {

	public function __construct () {
		$this->beforeFilter('auth_role_admin');
	}

	public function showListUser () {
		$list_user = DB::table('users')->where('role', 0)->paginate(20);
		return View::make('user.list-user')->with('list_user', $list_user);
	}

	public function deleteUser ($id) {
		$result = DB::table('users')->where('id', $id)->delete();
		if ($result) {
			return Redirect::to('list-user')->with('result_delete_user', 1);
		} else {
			return Redirect::to('list-user')->with('result_delete_user', -1);
		}
	}

	public function addUser () {
		if (!Input::has('username') || !Input::has('password')) {
			return Redirect::to('list-user')->with('result_add_user', -2);		
		} else {
			$username = Input::get('username');
			$password = Hash::make(Input::get('password'));
			$user = new User();
			$user->username = $username;
			$user->password = $password;
			$user->role = 0;
			if ($user->save()) {
				return Redirect::to('list-user')->with('result_add_user', 1);
			} else {
				return Redirect::to('list-user')->with('result_add_user', -1);
			}	
		}
		

	}

}

?>