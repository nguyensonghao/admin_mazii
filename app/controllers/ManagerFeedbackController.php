<?php 

class ManagerFeedbackController extends BaseController {

	public function __construct () {

	}

	public function get_list_feedback () {
		$list['list_note'] = DB::table('report_mean')->pagination(20);
		return View::make('feedback', $list);
	}

	public function active_feedback ($feedback_id) {
		if (DB::table('report_mean')->where('report_id', $feedback_id)
			->update(array('status' => 1))) {
			return Redirect::back()->with('alert', 'Có lỗi xảy ra trong quá trình xử lí');
		} else {
			return Redirect::back()->with('alert', 'Active góp ý thành công');
		}
	}

	public function block_feedback ($feedback_id) {
		if (DB::table('report_mean')->where('report_id', $feedback_id)
		    ->update(array('status' => -1))) {
			return Redirect::back()->with('alert', 'Có lỗi xảy ra trong quá trình xử lí');
		} else {
			return Redirect::back()->with('alert', 'Block góp ý thành công');
		}
	}

}

?>