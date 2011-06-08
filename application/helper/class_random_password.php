<?php
class generate_salt {
	public function generatePassword($length = 8)  {
	        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
	        $numChars = strlen($chars);
	 
	        $string = '';
	        for ($i = 0; $i < $length; $i++) {
	            $string .= substr($chars, rand(1, $numChars) - 1, 1);
	        }
	        return $string;
		}//end function
	} // END Class Generate Salt
?>