<?php 

class HistoryReportController extends BaseController {

	public function __construct () {
		$this->beforeFilter('auth_login');
	}

	public function showHistoryKanji () {
		$kanji_history = DB::table('kanji_history')->paginate(20);
		return View::make('history.history-kanji')->with('kanji_history', $kanji_history)->with('active_kanji', 'active');
	}

	public function showHistoryJavi () {
		$javi_history = DB::table('javi_history')->paginate(20);
		return View::make('history.history-javi')->with('javi_history', $javi_history)->with('active_javi', 'active');
	}

	public function showHistoryVija () {
		$vija_history = DB::table('vija_history')->paginate(20);
		return View::make('history.history-vija')->with('vija_history', $vija_history)->with('active_vija', 'active');
	}

	public function showHistoryGrammar () {
		$grammar_history = DB::table('grammar_history')->paginate(20);
		return View::make('history.history-grammar')->with('grammar_history', $grammar_history)->with('active_kanji', 'active');
	}	

	public function showDetailHistoryKanji ($id) {
		$kanji = DB::table('kanji')->where('id', $id)->first();
		$kanji_history = DB::table('kanji_history')->where('id', $id)->first();
		return View::make('history.detail-history-kanji')->with('kanji', $kanji)
		->with('kanji_history', $kanji_history)->with('active_kanji', 'active');
	}

	public function showDetailHistoryJavi ($id) {
		$javi = DB::table('javi')->where('id', $id)->first();
		$javi_history = DB::table('javi_history')->where('id', $id)->first();
		return View::make('history.detail-history-javi')->with('javi', $javi)
		->with('javi_history', $javi_history)->with('active_javi', 'active');
	}

	public function showDetailHistoryVija ($id) {
		$vija = DB::table('vija')->where('id', $id)->first();
		$vija_history = DB::table('vija_history')->where('id', $id)->first();
		return View::make('history.detail-history-vija')->with('vija', $vija)
		->with('vija_history', $vija_history)->with('active_vija', 'active');
	}

	public function showDetailHistoryGrammar ($id) {
		$grammar = DB::table('grammar')->where('id', $id)->first();
		$grammar_history = DB::table('grammar_history')->where('id', $id)->first();
		return View::make('history.detail-history-grammar')->with('grammar', $grammar)
		->with('grammar_history', $grammar_history)->with('active_grammar', 'active');
	}

	public function undoHistoryKanji ($id) {
		$kanji_history = DB::table('kanji_history')->where('id', $id)->first();
		$kanji_update = [];

		$kanji_update['id'] = $kanji_history->id;
		$kanji_update['kanji'] = $kanji_history->kanji;
		$kanji_update['mean'] = $kanji_history->mean;
		$kanji_update['level'] = $kanji_history->level;
		$kanji_update['on'] = $kanji_history->on;
		$kanji_update['kun'] = $kanji_history->kun;
		$kanji_update['img'] = htmlentities($kanji_history->img);
		$kanji_update['detail']=  $kanji_history->detail;
		$kanji_update['short'] =  $kanji_history->short;
		$kanji_update['freq'] =  $kanji_history->freq;
		$kanji_update['comp'] =  $kanji_history->comp;
		$kanji_update['stroke_count'] =  $kanji_history->stroke_count;
		$kanji_update['compDetail'] =  $kanji_history->compDetail;
		$kanji_update['examples'] = $kanji_history->examples;
		DB::table('kanji')->where('id', $id)->update($kanji_update);
		return Redirect::to('history-kanji/'.$id)->with('result-undo', 1);
	}

	public function undoHistoryJavi ($id) {
		$javi_history = DB::table('javi_history')->where('id', $id)->first();
		$javi_update = [];

		$javi_update['id'] = $javi_history->id;
		$javi_update['word'] =  $javi_history->word;
		$javi_update['phonetic'] = $javi_history->phonetic;
		$javi_update['mean'] =  $javi_history->mean;
		DB::table('javi')->where('id', $id)->update($javi_update);
		return Redirect::to('history-javi/'.$id)->with('result-undo', 1);
	}

	public function undoHistoryVija ($id) {
		$vija_history = DB::table('vija_history')->where('id', $id)->first();
		$vija_update = [];

		$vija_update['id'] =  $vija_history->id;
		$vija_update['word'] = $vija_history->word;
		$vija_update['mean'] = $vija_history->mean;
		DB::table('kanji')->where('id', $id)->update($vija_update);
		return Redirect::to('history-vija/'.$id)->with('result-undo', 1);
	}

	public function undoHistoryGrammar ($id) {
		$grammar_history = DB::table('grammar_history')->where('id', $id)->first();
		$grammar_update = [];

		$grammar_update['id'] = $grammar_history->id;
		$grammar_update['struct'] = $grammar_history->struct;
		$grammar_update['detail'] = $grammar_history->detail;
		$grammar_update['level'] =  $grammar_history->level;
		$grammar_update['struct_vi'] =  $grammar_history->struct_vi;
		DB::table('grammar')->where('id', $id)->update($grammar_update);
		return Redirect::to('history-grammar/'.$id)->with('result-undo', 1);
	}

}

?>