<?
class current_number {
	public function CurrentNumber($currentNumber = '') {
	    $numberList = range('1', '31');
	    
        $numberOutput = '';
        
	    // Loop NumberList
	    foreach ($numberList as $number) {
	        $numberOutput .= '<option value="'.$number.'">'.$number.'</option>';
    	    } // END foreach
    	    
	    return $numberOutput;
		} // END Function Current Number
	} // END Class Current Number
?>
