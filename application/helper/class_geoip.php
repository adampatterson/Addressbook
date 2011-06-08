<?php
	// @todo test to see if this class works
	/**
	*  If lat lng == Null then use http://iplocationtools.com/ip_query.php?ip=74.125.45.100 
	*  and take the clients IP address, bring back the City
	*
	* @param  	accepts a single string (lng, lat, city, country, regon, Gmtoffset, Dstoffset)
	* @return 	string
	* @author	Adam Patterson
	* @version	v1
	*/
	
	function getGeoIp($value='gps') {
		// Get the users IP address
		$ip = getenv('REMOTE_ADDR');
		
		// This address will return XML.    
		$geoAddress = "http://ipinfodb.com/ip_query.php?key=8ff32b1bfa9150d9caf9271a5124ea1e654bc7dcee611ba9a840116510a8dea2&ip=". $ip;

		/* Sample output
		<Response>
		<Ip>68.148.73.26</Ip>
		<Status>OK</Status>
		<CountryCode>CA</CountryCode>
		<CountryName>Canada</CountryName>
		<RegionCode>01</RegionCode>
		<RegionName>Alberta</RegionName>
		<City>Edmonton</City>
		<ZipPostalCode/>
		<Latitude>53.55</Latitude>
		<Longitude>-113.5</Longitude>
		<Gmtoffset>-7.0</Gmtoffset>
		<Dstoffset>-6.0</Dstoffset>
		</Response>
		*/
		
		// Retrieve the URL contents
		$geoContents = file_get_contents($geoAddress);
		
		// Parse the returned XML file
		$xml = new SimpleXMLElement($geoContents);
		
		$gps =          $xml->Longitude.', '.$xml->Latitude;
        $lng = 			$xml->Longitude;
		$lat = 			$xml->Latitude;
		$city = 		$xml->City;
		$country = 		$xml->CountryName;
		$regon = 		$xml->regonName;
		$Gmtoffset = 	$xml->Gmtoffset;
		$Dstoffset = 	$xml->Dstoffset;
	
		// Parse the coordinate string
		 switch ($value) {
		 	case 'gps':
				return $gps;
		 		break;
		 	case 'lng':
				return $lng;
		 		break;
			case 'lat':
				return $lat;
				break;
			case 'city':
				return $city;
				break;
			case 'country':
				return $country;
				break;
			case 'regon':
				return $regon;
				break;
			case 'Gmtoffset':
				return $Gmtoffset;
				break;
			case 'Dstoffset':
				return $Dstoffset;
				break;
		 	default:
				return "na";
		 	} // END switch
		
		//$getGeoResults = array($lng,$lat,$city,$country,$regon,$Gmtoffset,$Dstoffset);
		
	    }// END Function Get Geo IP 
?>