<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
//+----------------------------------------------------------------------+
//| WAMP (XP-SP2/2.2/5.2/5.1.0)                                          |
//+----------------------------------------------------------------------+
//| Copyright(c) 2001-2008 Michael Wimmer                                |
//+----------------------------------------------------------------------+
//| Licence: GNU General Public License v3                               |
//+----------------------------------------------------------------------+
//| Authors: Michael Wimmer <flaimo@gmail.com>                           |
//+----------------------------------------------------------------------+
//
// $Id$

/**
* @package vCard
*/
/**
* Create a vCard file for download
*
* <code>
* $vCard = new vCard($lang,$download_dir);
* $vCard->setLastName('Mustermann');
* �
* $vCard->outputFile('vcf');
* </code>
*
* Tested with Apache 2.2 and PHP 5.2.0
* Last change: 2008-04-06
*
* @desc Create a vCard file for download
* @access public
* @author Michael Wimmer <flaimo@mail.com>
* @copyright Michael Wimmer
* @link http://code.google.com/p/flaimo-php
* @package vCard
* @example sample_vcard.php Sample script
* @version 2.001
*/
class VCard {

  /*-------------------*/
  /* V A R I A B L E S */
  /*-------------------*/

  /**#@+
  * @var string
  */
  /**
  * Output string to be written in the vCard file
  */
  private $output;

  /**
  * Format of the output (vcf)
  */
  private $output_format;
  private $first_name;
  private $middle_name;
  private $last_name;
  private $edu_title;
  private $addon;
  private $nickname;
  private $company;
  private $organisation;
  private $department;
  private $job_title;
  private $note;
  private $tel_work1_voice;
  private $tel_work2_voice;
  private $tel_home1_voice;
  private $tel_home2_voice;
  private $tel_cell_voice;
  private $tel_car_voice;
  private $tel_pager_voice;
  private $tel_additional;
  private $tel_work_fax;
  private $tel_home_fax;
  private $tel_isdn;
  private $tel_preferred;
  private $tel_telex;
  private $work_street;
  private $work_zip;
  private $work_city;
  private $work_region;
  private $work_country;
  private $home_street;
  private $home_zip;
  private $home_city;
  private $home_region;
  private $home_country;
  private $postal_street;
  private $postal_zip;
  private $postal_city;
  private $postal_region;
  private $postal_country;
  private $url_work;
  private $role;
  private $birthday;
  private $email;
  private $rev;
  private $lang;
  /**#@-*/

  /*-----------------------*/
  /* C O N S T R U C T O R */
  /*-----------------------*/

  /**
  * Constructor
  *
  * Only job is to set all the variablesnames
  *
  * @param string $lang
  * @return void
  * @uses VCard::$card_filename
  * @uses VCard::$rev
  * @uses setLanguage()
  */
  function __construct($lang = '') {
    $this->card_filename  = (string) time() . '.vcf';
    $this->rev              = (string) date('Ymd\THi00\Z',time());
    $this->setLanguage($lang);
  } // end function


  /*-------------------*/
  /* F U N C T I O N S */
  /*-------------------*/

  /**
  * Sets the value for a class variable
  *
  * @param string $var variable the value should be assigned to
  * @param mixed $value value to be assigned (converted to string)
  * @return void
  * @since 2.000 - 2003-07-05
  */
  private function setString($var, $value = '') {
    if (strlen(trim($value)) > 0) {
      $this->$var = (string) $value;
    } // end if
  } // end function

  /**#@+
  * @param mixed $string value to be assigned
  * @return void
  * @uses setString()
  */
  public function setFirstName($string = '') {
    $this->setString('first_name', $string);
  } // end function

  public function setMiddleName($string = '') {
    $this->setString('middle_name', $string);
  } // end function

  public function setLastName($string = '') {
    $this->setString('last_name', $string);
  } // end function

  public function setEducationTitle($string = '') {
    $this->setString('edu_title', $string);
  } // end function

  public function setAddon($string = '') {
    $this->setString('addon', $string);
  } // end function

  public function setNickname($string = '') {
    $this->setString('nickname', $string);
  } // end function

  public function setCompany($string = '') {
    $this->setString('company', $string);
  } // end function

  public function setOrganisation($string = '') {
    $this->setString('organisation', $string);
  } // end function

  public function setDepartment($string = '') {
    $this->setString('department', $string);
  } // end function

  public function setJobTitle($string = '') {
    $this->setString('job_title', $string);
  } // end function

  public function setNote($string = '') {
    $this->setString('note', $string);
  } // end function

  public function setTelephoneWork1($string = '') {
    $this->setString('tel_work1_voice', $string);
  } // end function

  public function setTelephoneWork2($string = '') {
    $this->setString('tel_work2_voice', $string);
  } // end function

  public function setTelephoneHome1($string = '') {
    $this->setString('tel_home1_voice', $string);
  } // end function

  public function setTelephoneHome2($string = '') {
    $this->setString('tel_home2_voice', $string);
  } // end function

  public function setCellphone($string = '') {
    $this->setString('tel_cell_voice', $string);
  } // end function

  public function setCarphone($string = '') {
    $this->setString('tel_car_voice', $string);
  } // end function

  public function setPager($string = '') {
    $this->setString('tel_pager_voice', $string);
  } // end function

  public function setAdditionalTelephone($string = '') {
    $this->setString('tel_additional', $string);
  } // end function

  public function setFaxWork($string = '') {
    $this->setString('tel_work_fax', $string);
  } // end function

  public function setFaxHome($string = '') {
    $this->setString('tel_home_fax', $string);
  } // end function

  public function setISDN($string = '') {
    $this->setString('tel_isdn', $string);
  } // end function

  public function setPreferredTelephone($string = '') {
    $this->setString('tel_preferred', $string);
  } // end function

  public function setTelex($string = '') {
    $this->setString('tel_telex', $string);
  } // end function

  public function setWorkStreet($string = '') {
    $this->setString('work_street', $string);
  } // end function

  public function setWorkZIP($string = '') {
    $this->setString('work_zip', $string);
  } // end function

  public function setWorkCity($string = '') {
    $this->setString('work_city', $string);
  } // end function

  public function setWorkRegion($string = '') {
    $this->setString('work_region', $string);
  } // end function

  public function setWorkCountry($string = '') {
    $this->setString('work_country', $string);
  } // end function

  public function setHomeStreet($string = '') {
    $this->setString('home_street', $string);
  } // end function

  public function setHomeZIP($string = '') {
    $this->setString('home_zip', $string);
  } // end function

  public function setHomeCity($string = '') {
    $this->setString('home_city', $string);
  } // end function

  public function setHomeRegion($string = '') {
    $this->setString('home_region', $string);
  } // end function

  public function setHomeCountry($string = '') {
    $this->setString('home_country', $string);
  } // end function

  public function setPostalStreet($string = '') {
    $this->setString('postal_street', $string);
  } // end function

  public function setPostalZIP($string = '') {
    $this->setString('postal_zip', $string);
  } // end function

  public function setPostalCity($string = '') {
    $this->setString('postal_city', $string);
  } // end function

  public function setPostalRegion($string = '') {
    $this->setString('postal_region', $string);
  } // end function

  public function setPostalCountry($string = '') {
    $this->setString('postal_country', $string);
  } // end function

  public function setURLWork($string = '') {
    $this->setString('url_work', $string);
  } // end function

  public function setRole($string = '') {
    $this->setString('role', $string);
  } // end function

  public function setEMail($string = '') {
    $this->setString('email', $string);
  } // end function
  /**#@-*/

  /**
  * Set Language (iso code) for the Strings in the vCard file
  *
  * @param string $isocode
  * @return void
  * @uses isValidLanguageCode()
  * @uses VCard::$lang
  */
  protected function setLanguage($isocode = '') {
    $this->lang = (string) (($this->isValidLanguageCode($isocode) == TRUE) ? ';LANGUAGE=' . $isocode : '');
  } // end function

  /**
  * @param int $timestamp
  * @return void
  * @uses VCard::$birthday
  */
  public function setBirthday($timestamp) {
    $this->birthday = (int) date('Ymd',$timestamp);
  } // end function

  /**
  * Encodes a string for QUOTE-PRINTABLE
  *
  * @param string $quotprint  String to be encoded
  * @return string Encodes string
  * @author Harald Huemer <harald.huemer@liwest.at>
  */
  protected function quotedPrintableEncode($quotprint) {
    /*
    //beim Mac Umlaute nicht kodieren !!!! sonst Fehler beim Import
    if ($progid == 3)
      {
      $quotprintenc = preg_replace("~([\x01-\x1F\x3D\x7F-\xBF])~e", "sprintf('=%02X', ord('\\1'))", $quotprint);
      return($quotprintenc);
      }
    //bei Windows und Linux alle Sonderzeichen kodieren
    else
      {*/
    $quotprint = (string) str_replace('\r\n',chr(13) . chr(10),$quotprint);
    $quotprint = (string) str_replace('\n',chr(13) . chr(10),$quotprint);
    $quotprint = (string) preg_replace("~([\x01-\x1F\x3D\x7F-\xFF])~e", "sprintf('=%02X', ord('\\1'))", $quotprint);
    $quotprint = (string) str_replace('\=0D=0A','=0D=0A',$quotprint);
    return (string) $quotprint;
  } // end function

  /**
  * Checks if a given string is a valid iso-language-code
  *
  * @param string $code  String that should validated
  * @return boolean $isvalid  If string is valid or not
  */
  protected static final function isValidLanguageCode($code) { // PHP5: protected
    return (boolean) ((preg_match('(^([a-zA-Z]{2})((_|-)[a-zA-Z]{2})?$)',trim($code)) > 0) ? TRUE : FALSE);
  } // end function

  /**
  * Checks a single item if it is available and adds it to the output string
  *
  * @param string $var  class variable
  * @param string $prefix string to be added before the variable value
  * @param string $sufix string to be added after the variable value
  * @return void
  * @uses VCard::$output
  * @since 2.001 - 2003-07-07
  */
  protected function addSingleOutput($var = 'x', $prefix = '', $sufix = '') {
    if (isset($this->$var)) {
      $this->output .= (string) $prefix . $this->$var . $sufix . "\r\n";
    } // end if
  } // end function

  /**
  * Generates the string to be written in the file later on
  *
  * @param string $format only vcf so far
  * @return void
  * @see getCardOutput()
  * @see writeCardFile()
  * @uses quotedPrintableEncode()
  * @uses VCard::$output
  */
  protected function generateCardOutput($format) {
    $this->output_format = (string) $format;
    if ($this->output_format == 'vcf') {
      $this->output  = (string) "BEGIN:VCARD\r\n";
      $this->output .= (string) "VERSION:2.1\r\n";
      $this->output .= (string) 'N;ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->last_name . ';' . $this->first_name . ';' . $this->middle_name . ';' . $this->addon) . "\r\n";
      $this->output .= (string) 'FN;ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->addon) . "\r\n";
      if (strlen(trim($this->nickname)) > 0) {
        $this->output .= (string) "NICKNAME;ENCODING=QUOTED-PRINTABLE:" . $this->quotedPrintableEncode($this->nickname) . "\r\n";
      } // end if
      $this->output .= (string) 'ORG' . $this->lang . ';ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->organisation) . ';' . $this->quotedPrintableEncode($this->department) . "\r\n";
      if (strlen(trim($this->job_title)) > 0) {
        $this->output .= (string) 'TITLE' . $this->lang . ';ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->job_title) . "\r\n";
      } // end if
      if (isset($this->note)) {
        $this->output .= (string) 'NOTE' . $this->lang . ';ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->note) . "\r\n";
      } // end if
      $this->addSingleOutput('tel_work1_voice', 'TEL;WORK;VOICE:', '');
      $this->addSingleOutput('tel_work2_voice', 'TEL;WORK;VOICE:', '');
      $this->addSingleOutput('tel_home1_voice', 'TEL;HOME;VOICE:', '');
      $this->addSingleOutput('tel_cell_voice', 'TEL;CELL;VOICE:', '');
      $this->addSingleOutput('tel_car_voice', 'TEL;CAR;VOICE:', '');
      $this->addSingleOutput('tel_additional', 'TEL;VOICE:', '');
      $this->addSingleOutput('tel_pager_voice', 'TEL;PAGER;VOICE:', '');
      $this->addSingleOutput('tel_work_fax', 'TEL;WORK;FAX:', '');
      $this->addSingleOutput('tel_home_fax', 'TEL;HOME;FAX:', '');
      $this->addSingleOutput('tel_home2_voice', 'TEL;HOME:', '');
      $this->addSingleOutput('tel_isdn', 'TEL;ISDN:', '');
      $this->addSingleOutput('tel_preferred', 'TEL;PREF:', '');
      $this->output .= (string) 'ADR;WORK:;' . $this->company . ';' . $this->work_street . ';' . $this->work_city . ';' . $this->work_region . ';' . $this->work_zip . ';' . $this->work_country . "\r\n";
      $this->output .= (string) 'LABEL;WORK;ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->company) . '=0D=0A' . $this->quotedPrintableEncode($this->work_street) . '=0D=0A' . $this->quotedPrintableEncode($this->work_city) . ', ' . $this->quotedPrintableEncode($this->work_region) . ' ' . $this->quotedPrintableEncode($this->work_zip) . '=0D=0A' . $this->quotedPrintableEncode($this->work_country) . "\r\n";
      $this->output .= (string) 'ADR;HOME:;' . $this->home_street . ';' . $this->home_city . ";" . $this->home_region . ';' . $this->home_zip . ';' . $this->home_country . "\r\n";
      $this->output .= (string) 'LABEL;HOME;ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->home_street) . '=0D=0A' . $this->quotedPrintableEncode($this->home_city) . ', ' . $this->quotedPrintableEncode($this->home_region) . ' ' . $this->quotedPrintableEncode($this->home_zip) . '=0D=0A' . $this->quotedPrintableEncode($this->home_country) . "\r\n";
      $this->output .= (string) 'ADR;POSTAL:;' . $this->postal_street . ';' . $this->postal_city . ';' . $this->postal_region . ';' . $this->postal_zip . ';' . $this->postal_country . "\r\n";
      $this->output .= (string) 'LABEL;POSTAL;ENCODING=QUOTED-PRINTABLE:' . $this->quotedPrintableEncode($this->postal_street) . '=0D=0A' . $this->quotedPrintableEncode($this->postal_city) . ', ' . $this->quotedPrintableEncode($this->postal_region) . ' ' . $this->quotedPrintableEncode($this->postal_zip) . '=0D=0A' . $this->quotedPrintableEncode($this->postal_country) . "\r\n";
      $this->addSingleOutput('url_work', 'URL;WORK:', '');
      $this->addSingleOutput('role', 'ROLE' . $this->lang . ':', '');
      $this->addSingleOutput('birthday', 'BDAY:', '');
      $this->addSingleOutput('email', 'EMAIL;PREF;INTERNET:', '');
      $this->addSingleOutput('tel_telex', 'EMAIL;TLX:', '');
      $this->output .= (string) 'REV:' . $this->rev . "\r\n";
      $this->output .= (string) "END:VCARD\r\n";
    } // end if output_format == 'vcf'
  } // end function

  /**
  * Loads the string into the variable if it hasn�t been set before
  *
  * @param string $format only vcf so far
  * @return string $output
  * @uses generateCardOutput()
  * @uses VCard::$output
  * @uses VCard::$output_format
  */
  public function getCardOutput($format) {
    if (!isset($this->output) || $this->output_format != $format) {
      $this->generateCardOutput($format);
    } // end if
    return (string) $this->output;
  } // end function

  /**
  * Sends the right header information and outputs the generated content to
  * the browser
  *
  * @param string $format only vcf so far
  * @return void
  * @uses getCardOutput()
  * @since 1.02 - 2002-12-23
  */
  public function outputFile($format = 'vcf') {
    if ($format == 'vcf') {
      header('Content-Type: text/x-vcard');
      header('Content-Disposition: attachment; filename=vCard_' . date('Y-m-d_H-m-s') . '.vcf');
      echo $this->getCardOutput('vcf');
    } // end if
  } // end function
} // end class vCard
?>