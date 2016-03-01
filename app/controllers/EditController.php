<?php 

class EditController extends BaseController {


	public function __construct () {
		$this->beforeFilter('auth_login');
	}

	public function editJavi () {
		$javi = Input::all();
		$javi_history = DB::table('javi')->where('id', Input::get('id'))->first();
		if (!$this->validate_json(Input::get('mean'))) {
			Session::flash('result-edit', -2);
			return Redirect::back();	
		} else {
			$result = DB::table('javi')->where('id', Input::get('id'))->update($javi);

			if ($result) {
				Session::flash('result-edit', 1);
				// update in javihistory
				$javi_check = DB::table('javi_history')->where('id', Input::get('id'))->first();
				$javi_history = json_decode(json_encode($javi_history),true);
				$javi_history['lastUpdate'] = date('Y-m-d H:i:s');
				//check if has this javi in javi_history
				if (isset($javi_check) && $javi_check != null) {
					$javi_history_numberupdate = $javi_check->numberUpdate;
					$javi_check = json_decode(json_encode($javi_check),true);
					$javi_history_update = $javi_check;
					$javi_history_update['numberUpdate'] = $javi_history_numberupdate + 1;
					DB::table('javi_history')->where('id', $javi_check['id'])->update($javi_history_update);
				} else {
					$javi_history_insert = $javi_history;
					$javi_history_insert['numberUpdate'] = 1;
					DB::table('javi_history')->insert($javi_history_insert);	
				}
			} else {
				Session::flash('result-edit', -1);
			}
			return Redirect::back();	
		}
		
	}

	public function editVija () {
		$vija = Input::all();
		if (!$this->validate_json(Input::get('mean'))) {
			Session::flash('result-edit', -2);
			return Redirect::back();			
		} else {
			$vija_history = DB::table('vija')->where('id', Input::get('id'))->first();
			$result = DB::table('vija')->where('id', Input::get('id'))->update($vija);

			if ($result) {
				// update in vijahistory
				$vija_check = DB::table('vija_history')->where('id', Input::get('id'))->first();
				$vija_history = json_decode(json_encode($vija_history),true);
				$vija_history['lastUpdate'] = date('Y-m-d H:i:s');
				//check if has this vija in vija_history
				if (isset($vija_check) && $vija_check != null) {
					$vija_history_numberupdate = $vija_check->numberUpdate;
					$vija_check = json_decode(json_encode($vija_check),true);
					$vija_history_update = $vija_check;
					$vija_history_update['numberUpdate'] = $vija_history_numberupdate + 1;
					DB::table('vija_history')->where('id', $vija_check['id'])->update($vija_history_update);
				} else {
					$vija_history_insert = $vija_history;
					$vija_history_insert['numberUpdate'] = 1;
					DB::table('vija_history')->insert($vija_history_insert);	
				}
				Session::flash('result-edit', 1);
			} else {
				Session::flash('result-edit', -1);
			}
			return Redirect::back();			
		}
		
	}

	public function editGrammar () {
		$grammar = Input::all();
		if (!$this->validate_json(Input::get('detail'))) {
			Session::flash('result-edit', -2);
			return Redirect::back();			
		} else {
			$grammar_history = DB::table('grammar')->where('id', Input::get('id'))->first();
			$result = DB::table('grammar')->where('id', Input::get('id'))->update($grammar);

			if ($result) {
				// update in grammarhistory
				$grammar_check = DB::table('grammar_history')->where('id', Input::get('id'))->first();
				$grammar_history = json_decode(json_encode($grammar_history),true);
				$grammar_history['lastUpdate'] = date('Y-m-d H:i:s');
				//check if has this vija in vija_history
				if (isset($grammar_check) && $grammar_check != null) {
					$grammar_history_numberupdate = $grammar_check->numberUpdate;
					$grammar_check = json_decode(json_encode($grammar_check),true);
					$grammar_history_update = $grammar_check;
					$grammar_history_update['numberUpdate'] = $grammar_history_numberupdate + 1;
					DB::table('grammar_history')->where('id', $grammar_check['id'])->update($grammar_history_update);
				} else {
					$grammar_history_insert = $grammar_history;
					$grammar_history_insert['numberUpdate'] = 1;
					DB::table('grammar_history')->insert($grammar_history_insert);	
				}
				Session::flash('result-edit', 1);
			} else {
				Session::flash('result-edit', -1);
			}
			return Redirect::back();			
		}
		
	}

	public function editKanji () {
		$kanji = Input::all();
		$kanji_history = DB::table('kanji')->where('id', Input::get('id'))->first();
		if (!$this->validate_json(Input::get('compDetail')) || !$this->validate_json(Input::get('examples'))) {
			Session::flash('result-edit', -2);
			return Redirect::back();	
		} else {
			$result = DB::table('kanji')->where('id', Input::get('id'))->update($kanji);

			if ($result) {
				// update in kanjihistory
				$kanji_check = DB::table('kanji_history')->where('id', Input::get('id'))->first();
				$kanji_history = json_decode(json_encode($kanji_history),true);
				$kanji_history['lastUpdate'] = date('Y-m-d H:i:s');
				//check if has this vija in vija_history
				if (isset($kanji_check) && $kanji_check != null) {
					$kanji_history_numberupdate = $kanji_check->numberUpdate;
					$kanji_check = json_decode(json_encode($kanji_check),true);
					$kanji_history_update = $kanji_check;
					$kanji_history_update['numberUpdate'] = $kanji_history_numberupdate + 1;
					DB::table('kanji_history')->where('id', $kanji_check['id'])->update($kanji_history_update);
				} else {
					$kanji_history_insert = $kanji_history;
					$kanji_history_insert['numberUpdate'] = 1;
					DB::table('kanji_history')->insert($kanji_history_insert);	
				}
				Session::flash('result-edit', 1);
			} else {
				Session::flash('result-edit', -1);
			}
			return Redirect::back();	
		}
		
	}

	protected function validate_json ($string_json) {
		$array_json = json_decode($string_json);
		if (is_null($array_json)) {
			return false;
		} 
		return true;
	}

}

?>