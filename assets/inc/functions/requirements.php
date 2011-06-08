<?php
// Gets the server PHP Version
function getPhpVersion () {
	// prints php version e.g. '4.1.1'
	echo  phpversion();
	}// End getPhpVersion()


// Gets the MYSQL Version
function getMysqlVersion () {
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Could not connect: " . mysql_error());
	
	$mysqlversion = mysql_get_server_info();
	
	echo $mysqlversion;
	
	}// End getMysqlVersion()
	
	
// Gets the GD Lib Version
function getGDVersion(){
	
	/* SAMPLE OUTPUT
	Array
	(
	    [GD Version] => bundled (2.0.34 compatible)
	    [FreeType Support] => 1
	    [FreeType Linkage] => with freetype
	    [T1Lib Support] => 
	    [GIF Read Support] => 1
	    [GIF Create Support] => 1
	    [JPG Support] => 1
	    [PNG Support] => 1
	    [WBMP Support] => 1
	    [XPM Support] => 
	    [XBM Support] => 1
	    [JIS-mapped Japanese Font Support] => 
	)  */

	if(function_exists('gd_info')) {
		$gd_info1 = gd_info();
		$gd_info = $gd_info1['GD Version'];
		if($gd_info == "") {
			$gd_info = "GD not installed";
			}
		else {
			if ($gd_info1["JPG Support"]) $gd_info .= " JPG Support,";
			if ($gd_info1["PNG Support"]) $gd_info .= " PNG Support,";
			if ($gd_info1["GIF Create Support"]) $gd_info .= " GIF Support,";
			if ($gd_info1["FreeType Support"]) $gd_info .= " FreeType Support,";
			}
		}// END function_exists('gd_info')
		
		echo $gd_info;
	}// End getGDVersion()
	
// Gets the Session Save Path
function getSessionPath() {
	echo session_save_path();
	}// End getSessionPath()
	
// Gets Server Software Version
function getServerSoft() {
	echo $_SERVER['SERVER_SOFTWARE'];
	}
	
// Get if File Upload
function getAllowUpload() {
	if(ini_get('file_uploads')==0) { 
	echo "no";
	} else { 
	echo "Yes";
	}
} // END getAllowUpload (){
?>