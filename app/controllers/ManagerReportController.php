<?php 
	require public_path() . '\libs\parse\autoload.php';
	use Parse\ParseClient;
	ParseClient::initialize( 'GnmiBlYGB7SXRQZjRTYrWFx2LgXccdjaTiRtDIos', 'bXT35xZbpMgmfqGX4ePjqABNSqjyJHwpGcLUkeb5', 'ziPBfVhB7DIM0T6CpiEmBBkXykKeIov5xkcnOoiO');
	use Parse\ParseObject;
	use Parse\ParseQuery;
	use Parse\ParseACL;
	use Parse\ParsePush;
	use Parse\ParseUser;
	use Parse\ParseInstallation;
	use Parse\ParseException;
	use Parse\ParseAnalytics;
	use Parse\ParseFile;
	use Parse\ParseCloud;

	class ManagerReportController extends BaseController {

		public $wordController;

		public function __construct () {
			$this->beforeFilter('auth_login');
		}

		public function showHome () {
			$query = new ParseQuery('ReportWrong');
			$query->notEqualTo('finish', 1);
			$query -> limit(1000);
			$result = $query->find();
			$perPage = 20;
			$currentPage = Input::get('page', 1) - 1;
			$pagedData = array_slice($result, $currentPage * $perPage, $perPage);
			$matches = Paginator::make($pagedData, count($result), $perPage);

			return View::make('home')->with('result', $matches);
		}

		public function showSort ($property, $key) {
			$query = new ParseQuery('ReportWrong');
			$query->notEqualTo('finish', 1);
			if ($key == 'asc') {
				$query->ascending($property);
			} else {
				$query->descending($property);
			}
			$query -> limit(1000);
			$result = $query->find();
			$perPage = 20;
			$currentPage = Input::get('page', 1) - 1;
			$pagedData = array_slice($result, $currentPage * $perPage, $perPage);
			$matches = Paginator::make($pagedData, count($result), $perPage);

			return View::make('home')->with('result', $matches);
		}

		public function showEdit ($objectId) {
			$query = new ParseQuery('ReportWrong');
			$query->equalTo("objectId", $objectId);
			$result = $query->first();
			$wordDatabase = $this->getWordById($result->get('entryId'), $result->get('type'), $result->get('entry'));
			return View::make('edit')->with('result', $result)->with('wordDatabase', $wordDatabase);
		}

		protected function getWordById ($id, $type, $word) {
			// function get word by id

			if ($type == 'word') {
				$this->wordController = new WordController($word);
				if ($this->wordController->isJapanese()) {
					Session::flash('type', 'javi');
					return DB::table('javi')->where('id', $id)->first();
				} else {
					Session::flash('type', 'vija');
					return DB::table('vija')->where('id', $id)->first();
				}
				
			} else if ($type == 'kanji') {
				Session::flash('type', 'kanji');
				return DB::table('kanji')->where('id', $id)->first();
			} else {
				Session::flash('type', 'grammar');
				return DB::table('grammar')->where('id', $id)->get();
			}
		}

		public function finishReport ($id) {
			$query = new ParseQuery('ReportWrong');
			$query->equalTo('entryId', $id);
			$result = $query->first();
			$finish = $result->get('finish');
			if ($finish == null || $finish == '' || $finish == 1) {
				$result->set('finish', 1);
				$result->save();
				return Redirect::to('home')->with('success-finish', 1);
			} else {
				return Redirect::to('home')->with('success-finish', -1);
			}
		}

	}

?>