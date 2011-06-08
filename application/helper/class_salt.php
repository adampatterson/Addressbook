<?php
class generate_salt {
	public function salt($max = 10) {
		$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$i = 0;
		$salt = "";
		do {
			$salt .= $characterList{mt_rand(0,strlen($characterList))};
			$i++;
		} while ($i <= $max);
		return $salt;
		} // END Function Salt
	} // END Class Generate Salt
?>