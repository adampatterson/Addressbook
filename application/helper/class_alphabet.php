<?php
class current_alphabet {

	public function alphabet( ) {  
	    $alphabet = range('a', 'z');
	    
	    $alphabetOutput = '<ul>';
	    $alphabetOutput .= '<li class="alphabet"><a href="'.url::page("page/listing").'">all</a></li>';
	    
	    // Loop Alphabet
	    foreach ($alphabet as $letter) {
	        $alphabetOutput .= '<li class="alphabet"><a href="'.url::page("page/alphabetical/").$letter.'">'.$letter.'</a></li>';
	    } // END foreach
	    
	    $alphabetOutput .= '</ul>';
	    
	    return $alphabetOutput;
	
		} // END currentAlphabet

	
	public function is_alphabet($current_letter, $alphabet) {
	    if ($current_letter == $alphabet) {
	        $current_style = 'currentAlphabet';
	    }	
		
		if (isset($current_style)) {
	   		return  $current_style;
		} else {
			return NULL;
		}
		
		} // END isAlphabet
	
	
	public function currentAlphabet( $current_letter ) {  
	
	    $alphabet = range('a', 'z');

	    if (!isset($current_letter)) {
	         $current_style = 'currentAlphabet';
	    }
	    $alphabetOutput = '<ul>';
	    $alphabetOutput .= '<li class="alphabet './*$currentStyle.*/'"><a href="'.url::page("page/listing").'">all</a></li>';
	   
	    // Loop Alphabet
	    foreach ($alphabet as $letter) {
	        $alphabetOutput .= '<li class="alphabet '.$this->is_alphabet($current_letter, $letter).'"><a href="'.url::page("page/alphabetical/").$letter.'">'.$letter.'</a></li>';
	    } // END foreach
	    
	    $alphabetOutput .= '</ul>';
	    
	    return $alphabetOutput;
	 
		} // END currentAlphabet
		
} // END Class Current Alphabet
?>
