<?php 

class ManagerMyNoteController extends BaseController {

	public function __construct () {

	}

	public function get_list_mynote () {
		$list['list_note'] = DB::table('report_mean')->pagination(20);
		return View::make('mynote', $list);
	}

}

?>