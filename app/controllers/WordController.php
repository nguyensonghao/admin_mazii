<?php 

	class WordController {

		public $word;

		public function __construct ($word) {
			$this->word = $word;
		}

		public function isJapanese () {
			if ($this->isHiragana($this->word) || $this->isKanji($this->word) || $this->isKatakan($this->word)) {
				return true;
			}

			return false;
		}

		public function isKanji ($str) {
	        return preg_match('/[\x{4E00}-\x{9FBF}]/u', $str) > 0;
    	}
    
    	public function isHiragana ($str) {
	        return preg_match('/[\x{3040}-\x{309F}]/u', $str) > 0;
	    }

	    public function isKatakan ($str) {
	        return preg_match('/[\x{30A0}-\x{30FF}]/u', $str) > 0;
		}


}


?>