<?php
class google {
	// @todo test to see if this class works
	// @todo try using this with JSON for maps API. Show the location and give the option to relocate the marker then save the location.
	/**
	* Takes the address values and returns json or xml based on the address. 
	*
	* @param  	string	$address, $city, $province, $country
	* @param 	string 	$output - json or xml/kml
	* @return 	array 	returns an array containing the lat and lng values.
	* @author	Adam Patterson
	* @version	1
	*/
	public function getGeo($address='', $city='', $province='', $country='', $postalcode='', $output='xml') { 
	
		$googleAddress = "http://maps.google.com/maps/geo?q=".urlencode($address) ."+".urlencode($city) ."+".urlencode($province)."+".urlencode($country)."&output=".$output;

     //code 200 is good
     //code 602 is bad
     
		// Retrieve the URL contents
		$googlePage = file_get_contents($googleAddress);
		
		// Parse the returned XML file
		$xml = new SimpleXMLElement($googlePage);
	
        $google_code = $xml->Response->Status->code;
	
  
    if ($google_code == '200' ) {
  
		// Parse the coordinate string
		list($lng, $lat, $altitude) = explode(",", $xml->Response->Placemark->Point->coordinates);
		
		$getGeoResults = array($lng,$lat);
		
    } else {
      $lng = '0';
      $lat = '0';
      $getGeoResults = array($lng,$lat);
    }
    
		return $getGeoResults;
	    }// END getGeo Function
	} // END Class Gooogle
?>