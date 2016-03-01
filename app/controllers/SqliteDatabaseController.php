<?php 

	class SqliteDatabaseController extends BaseController {

		public $db_handle;

		public function __construct () {
			$this->beforeFilter('auth_role_admin');
			
			$folder = public_path().'/database';
			// delete folder if exits
			if (!is_dir($folder)) {
				mkdir($folder, 0700, true);
			}			
			$filename = public_path() . '/database/javn.db';
			fopen($filename, "w r");
			$this->db_handle  = new SQLite3($filename);
		}

		public function showExport () {
			return View::make('export-sqlite');
		}

		public function downloadDatabaseSqlite () {
			Session::set('exporting', 1);
			$this->downloadGrammar();
			$this->downloadJavi();
			$this->downloadVija();
			$this->downloadKanij();
			Session::forget('exporting');
			return Redirect::to('export')->with('result-export', 1);
		}

		public function downloadKanij () {
			ini_set('max_execution_time', 600000000);
			$create_kanji = 'CREATE TABLE kanji (id INTEGER PRIMARY KEY  NOT NULL , kanji TEXT, mean TEXT, level INTEGER, "on" TEXT, kun TEXT, img VARCHAR, detail TEXT, short TEXT, freq INTEGER, comp TEXT, stroke_count INTEGER, compDetail TEXT, examples TEXT)';
			$this->db_handle->exec($create_kanji);
			$result = DB::table('kanji')->get();
			foreach ($result as $key => $value) {
				$id = $value->id;
				$kanji = $value->kanji;
				$mean = $value->mean;
				$level = $value->level;
				$on = $value->on;
				$kun = $value->kun;
				$img = $value->img;
				$detail = $value->detail;
				$short = $value->short;
				$freq = $value->freq;
				$comp = $value->comp;
				$stroke_count = $value->stroke_count;
				$compDetail = $value->compDetail;
				$examples = $value->examples;
				$query_string = "INSERT INTO kanji values(".$id.", '".$kanji."', '".$mean."', ".$level.", '".$on."', '".$kun."', '".$img."', '".$detail."', '".$short."', ".$freq.", '".$comp."', ".$stroke_count.", '".$compDetail."', '".$examples."')";
				$result = $this->db_handle->exec($query_string, $error);	
			}

			echo 'Xuất bảng Kanji thành công';
		}

		public function downloadGrammar () {
			ini_set('max_execution_time', 600000000);
			$create_grammar = 'CREATE TABLE grammar (id INTEGER PRIMARY KEY  NOT NULL ,struct TEXT,detail TEXT,level INTEGER, struct_vi TEXT)';
			$this->db_handle->exec($create_grammar);
			$result = DB::table('grammar')->get();
			foreach ($result as $key => $value) {
				$id = $value->id;
				$struct = $value->struct;
				$detail = $value->detail;
				$level = $value->level;
				$struct_vi = $value->struct_vi;
				$query_string = "INSERT INTO grammar values(".$id.", '".$struct."', '".$detail."', '".$level."', '".$struct_vi."')";
				$this->db_handle->exec($query_string);	
			}
			echo 'Xuất bảng Grammar thành công';
		}

		public function downloadJavi () {
			ini_set('max_execution_time', 600000000);
			$create_javi = 'CREATE TABLE javi (id INTEGER PRIMARY KEY  NOT NULL ,word TEXT NOT NULL , phonetic TEXT, mean TEXT)';
			$this->db_handle->exec($create_javi);
			$result = DB::table('javi')->get();
			foreach ($result as $key => $value) {
				$id = $value->id;
				$word = $value->word;
				$phonetic = $value->phonetic;
				$mean = $value->mean;
				$query_string = "INSERT INTO javi values(".$id.", '".$word."', '".$phonetic."', '".$mean."')";
				$this->db_handle->exec($query_string);	
			}
			echo 'Xuất bảng Javi thành công';
		}

		public function downloadVija () {
			ini_set('max_execution_time', 600000000);
			$create_vija = 'CREATE TABLE vija (id INTEGER PRIMARY KEY  NOT NULL,word TEXT NOT NULL ,mean TEXT NOT NULL )';
			$this->db_handle->exec($create_vija);
			$result = DB::table('vija')->get();
			foreach ($result as $key => $value) {
				$id = $value->id;
				$word = $value->word;
				$mean = $value->mean;
				$query_string = "INSERT INTO vija values(".$id.", '".$word."', '".$mean."')";
				$this->db_handle->exec($query_string);	
			}
			echo 'Xuất bảng Vija thành công';
		}

	}

?>