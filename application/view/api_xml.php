<?
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<markers>
	  <!-- Dont use copy and paste on this XML file, use "View Source" or "Save As"
       What the browser displays is *interpreted* XML, not XML source. -->	
<? foreach ($contacts as $contact):
	// Iterate the Contact Names
	if (!$contact->lat == "") {
		echo '<marker lat="'.$contact->lat.'" lng="'.$contact->lng.'" label="'.$contact->firstname." ".$contact->lastname.'" html="'.$contact->firstname." ".$contact->lastname.'&lt;br&gt;Some stuff to display in the&lt;br&gt;First Info Window"/>';
		}
	endforeach;// END foreach ?>
</markers>