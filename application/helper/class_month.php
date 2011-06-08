<?
class current_month {
	public function currentMonth($currentMonth = '') {
	    $numberList = range('1', '12');
        
        $numberOutput = '';
        
	    // Loop NumberList
	    foreach ($numberList as $number) {
	        
	        $month = date("F", mktime(0, 0, 0, $number, 0, 0)); // March
	        $month_number = date('m', mktime(0, 0, 0, $number, 0, 0));
			
	        $numberOutput .= '<option value="'.$month_number.'">'.$month.'</option>';
	    } // END foreach

	    return $numberOutput;
		} // END Function Current Month
	} // END Class Current Month
?>
