<?php 
class export_controller {
    //@todo accept a group, return all contacts
    //@todo accept a contact ID and return all data with it
    
    public function csv($type = 'application') {
      
          if(!user::valid()) { die; }
      
          // type can = outlook
          //@todo generate csv structure
          
          $table = db('addressbook');
          
          $contacts = $table->select('*')->order_by('firstname', 'asc')->execute();
          /*
           // Email
           home, home@a.com:::home@b.com, work, work@a.com, other, other@a.com,
           // Phone
           home, homephone, work, workphone, fax, faxphone, cell, cellphone, other, otherphone,
           // IM
           msn, msncontact, google, googlecontact, yahoo, yahoocontact, aim, aimcontact, icq, icqcontact, skype, skypecontact, twitter, twitterontact, other, othercontact
           */
          
          $out = '';
          
          // Full $out .='gid, firstname, lastname, address, address 2, postal, city, provence, country, website, lat, lng, birthdate, email 1 type, email 1 value, email 2 type, email 2 value, email 3 type, email 3 value, phone 1 type, phone 1 value, phone 2 type, phone 2 value, phone 3 type, phone 3 value, phone 4 type, phone 4 value, phone 5 type, phone 5 value, im 1 type, im 1 value, im 2 type, im 2 value, im 3 type, im 3 value, im 4 type, im 4 value, im 5 type, im 5 value, im 6 type, im 6 value, im 7 type, im 7 value, im 8 type, im 8 value';
          
          $out .= 'gid, id, firstname, lastname, address, address 2, postal, city, provence, country, website, lat, lng, birthdate';
          $out .= "\n";
          /*
           $contact[email_list] => a:2:{i:0;a:2:{i:0;s:19:"info@350designs.com";i:1;s:5:"other";}i:1;a:2:{i:0;s:22:"careers@350designs.com";i:1;s:5:"other";}}
           $contact[phone_list] => a:1:{i:2;a:2:{i:0;s:14:"(780) 441-6985";i:1;s:4:"work";}}
           $contact[im_list] => N;
           */
  
          foreach ($contacts as $contact):
              $out .= '"'.$contact->gid.'","'.$contact->id.'","'.$contact->firstname.'","'.$contact->lastname.'","'.$contact->address.'","'.$contact->address2.'","'.$contact->postalcode.'","'.$contact->city.'","'.$contact->province.'","'.$contact->country.'","'.$contact->website.'","'.$contact->lat.'","'.$contact->lng.'","'.$contact->birthdate.'"';
              $out .= "\n";
          endforeach;
                 
          // Open file export.csv.
          $f = fopen('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.csv', 'w');
          
          // Put all values from $out to export.csv.
          fputs($f, $out);
          fclose($f);
          
          header('Content-type: application/csv');
          header('Content-Disposition: attachment; filename="storage/db-backup/export-addressbook'.date("Y-m-d-H").'.csv"');
          readfile('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.csv');
    } // END Function csv

    
    public function vcard($id='') {
        if(!user::valid()) { die; }

    		// Select Database Table
    		$table = db('addressbook');
    		
    		// Get Contact From Database
    		$contact = $table->select('id','=',$id);
    
    		$contacts_table = load::model('contacts');

    		$singe_contacts = $contacts_table->get($id);
    		
    		$first_name = $contact[0]->firstname;
    		$last_name = $contact[0]->lastname;
    		$website = $contact[0]->website;
    		$address = $contact[0]->address;
    		$city = $contact[0]->city;
    		$province = $contact[0]->province;
    		$postalcode = $contact[0]->postalcode;
    		$country = $contact[0]->country;
        $company_name = $contact[0]->company_name;
        $title = $contact[0]->title;
        
        //load::helper('class_dbug');
        //new dBug($singe_contacts);

        load::helper('class_vcard');    
        
    		// Generate vCard
        $vCard = new vCard('','');
        
        $vCard->setFirstName($first_name);
        $vCard->setLastName($last_name);
        $vCard->setCompany($company_name);
        $vCard->setJobTitle($title);
        /*$vCard->setNote('Additional Note go here');
        $vCard->setTelephoneWork1('+43 (05555) 000000');
        $vCard->setTelephoneHome1('+43 (05555) 000000');
        $vCard->setCellphone('+43 (05555) 000000');
        $vCard->setCarphone('+43 (05555) 000000');
        $vCard->setFaxWork('+43 (05555) 000000');
        $vCard->setFaxHome('+43 (05555) 000000');
        $vCard->setPreferredTelephone('+43 (05555) 000000');
        $vCard->setTelex('+43 (05555) 000000');
        */
        $vCard->setHomeStreet($address);
        $vCard->setHomeZIP($postalcode);
        $vCard->setHomeCity($city);
        $vCard->setHomeRegion($province);
        $vCard->setHomeCountry($country);
        /*
        $vCard->setURLWork('http://flaimo.com');
        $vCard->setBirthday(time());
        $vCard->setEMail('flaimo@gmx.net');
        */
        $vCard->outputFile('vcf');
    } // END Function VCard

    
    public function sql() {
        
        if(!user::valid()) { die; }
      
        // Look at http://www.dagondesign.com/articles/automatic-mysql-backup-script/ for emailing features, possible implementation at a later date.
        //@todo generate SQL Dump
        $table = db('addressbook');
        
        ob_start();
        $db_settings = config::get('db');
        
        $dbhost = $db_settings['default']['host'];
        $dbuser = $db_settings['default']['username'];
        $dbpass = $db_settings['default']['password'];
        $dbname = $db_settings['default']['database'];

        // Select Database Table
        $table = db('addressbook');
        
        $backupFile = $dbname.date("Y-m-d-H-i-s").'.sql';
        $command = "mysqldump  --add-drop-table --host=$dbhost --user='$dbuser' --password='$dbpass' $dbname";
        //echo $command;
        
        system($command);
        
        $dump = ob_get_contents();
        ob_end_clean();
        
        $fp = fopen('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.sql', 'w');
        fputs($fp, $dump);
        fclose($fp);
        
        header('Content-type: application/sql');
        header('Content-Disposition: attachment; filename="storage/db-backup/export-addressbook'.date("Y-m-d-H").'.sql"');
        readfile('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.sql');
    } // END Function SQL

    
    public function xml($type = 'application') {
      
       if(!user::valid()) { die; }
      
        //@todo generate xml structure
        $table = db('addressbook');
        
        $contacts = $table->select('*')->order_by('firstname', 'asc')->execute();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        
/*
		http://www.slis.kent.edu/~mzeng/metadata/schemas/vcard.htm
        $out .= '"'.$contact->gid.'","'.$contact->id.'","'.$contact->firstname.'","'.$contact->lastname.'","'.$contact->address.'","'.$contact->address2.'","'.$contact->postalcode.'","'.$contact->city.'","'.$contact->province.'","'.$contact->country.'","'.$contact->website.'","'.$contact->lat.'","'.$contact->lng.'","'.$contact->birthdate.'"';
        $out .='gid, id, firstname, lastname, address, address 2, postal, city, provence, country, website, lat, lng, birthdate';
*/
        
        $xml .= '<contacts>';
        foreach ($contacts as $contact):
            $xml .= '<contact>
		       			<name>';
            $xml .= $contact->firstname.' '.$contact->lastname;
            $xml .= '</name>
		        		<adr>
		            		<rdf:Description>
		               <street-address>';
            $xml .= $contact->address.' '.$contact->address2;
            $xml .= '</street-address>
		               <locality>';
            $xml .= $contact->city;
            $xml .= '</locality>
		               <postal-code>';
            $xml .= $contact->postalcode;
            $xml .= '</postal-code>
		               <country-name>';
            $xml .= $contact->country;
            $xml .= '</country-name>
		            </rdf:Description>
		            <geo>
		                <latitude>';
            $xml .= $contact->lat;
            $xml .= '</latitude>
		                <longitude>';
            $xml .= $contact->lng;
            $xml .= '</longitude>
		            </geo>
		        </adr>
				<tel>
					<!-- phone with type -->
				</tel>
				<email>
					<!-- email with type -->
				</email>
				<im>
					<!-- email with type -->
				</im>
				<photo resource="data:image/gif;base64,MSJD9s9DS@93299..." />
		    </contact>';
        endforeach;// END foreach
        $xml .= '</contacts>';

        
        $fp = fopen('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.xml', 'w');
        fputs($fp, $xml);
        fclose($fp);
        
        header('Content-type: application/xml');
        header('Content-Disposition: attachment; filename="storage/db-backup/export-addressbook'.date("Y-m-d-H").'.xml"');
        readfile('storage/db-backup/export-addressbook'.date("Y-m-d-H").'.xml');
        
    } // END Function XML

    
    public function rdf($type = 'application') {
      
        if(!user::valid()) { die; }
      
        //@todo generate xml structure
        $table = db('addressbook');
        
        $contacts = $table->select('*')->order_by('firstname', 'asc')->execute();
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        // http://www.slis.kent.edu/~mzeng/metadata/schemas/vcard.htm
        //$out .= '"'.$contact->gid.'","'.$contact->id.'","'.$contact->firstname.'","'.$contact->lastname.'","'.$contact->address.'","'.$contact->address2.'","'.$contact->postalcode.'","'.$contact->city.'","'.$contact->province.'","'.$contact->country.'","'.$contact->website.'","'.$contact->lat.'","'.$contact->lng.'","'.$contact->birthdate.'"';
        //$out .='gid, id, firstname, lastname, address, address 2, postal, city, provence, country, website, lat, lng, birthdate';
        /*
         <v:org>
         <rdf:Description>
         <v:organisation-name>
         Example.Com LLC
         </v:organisation-name>
         <v:organisation-unit>
         Corporate Division
         </v:organisation-unit>
         </rdf:Description>
         </v:org>
         */

        
        $xml .= '<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:v="http://www.w3.org/2006/vcard/ns#">';
        foreach ($contacts as $contact):
            $xml .= '<v:VCard rdf:about = "http://application site URL">
		        <v:fn>';
            $xml .= $contact->firstname.' '.$contact->lastname;
            $xml .= '</v:fn>
		        <v:adr>
		            <rdf:Description>
		                <v:street-address>';
            $xml .= $contact->address.' '.$contact->address2;
            $xml .= '</v:street-address>
		                <v:locality>';
            $xml .= $contact->city;
            $xml .= '</v:locality>
		                <v:postal-code>';
            $xml .= $contact->postalcode;
            $xml .= '</v:postal-code>
		                <v:country-name>';
            $xml .= $contact->country;
            $xml .= '</v:country-name>
		                <rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Home"/>
		            </rdf:Description>
		        </v:adr>
				<v:adr>
		            <rdf:Description>
		                <v:street-address>';
            $xml .= $contact->address.' '.$contact->address2;
            $xml .= '</v:street-address>
		                <v:locality>';
            $xml .= $contact->city;
            $xml .= '</v:locality>
		                <v:postal-code>';
            $xml .= $contact->postalcode;
            $xml .= '</v:postal-code>
		                <v:country-name>';
            $xml .= $contact->country;
            $xml .= '</v:country-name>
		                <rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Work"/>
		            </rdf:Description>
		        </v:adr>
		        <v:geo>
		            <rdf:Description>
		                <v:latitude>';
            $xml .= $contact->lat;
            $xml .= '</v:latitude>
		                <v:longitude>';
            $xml .= $contact->lng;
            $xml .= '</v:longitude>
		            </rdf:Description>
		        </v:geo>
		        <v:tel>
		            <rdf:Description>
		                <rdf:value>';
            // Phone Work
            $xml .= '</rdf:value>
						<rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Work"/>
		            </rdf:Description>
		        </v:tel>
				<v:tel>
		            <rdf:Description>
		                <rdf:value>';
            // Phone Home
            $xml .= ' </rdf:value>
						<rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Home"/>
		            </rdf:Description>
		        </v:tel>
				<v:tel>
		            <rdf:Description>
		                <rdf:value>';
            // Phone Cell
            $xml .= '</rdf:value>
						<rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Cel"/>
		            </rdf:Description>
		        </v:tel>
				<v:tel>
		            <rdf:Description>
		                <rdf:value>';
            // Phone Fax
            $xml .= '</rdf:value>
						<rdf:type rdf:resource="http://www.w3.org/2006/vcard/ns#Fax"/>
		            </rdf:Description>
		        </v:tel>
				<v:email rdf:resource="// email"/>
				<v:photo rdf:resource="data:image/gif;base64,MSJD9s9DS@93299..." />
		    </v:VCard>';
        endforeach;// END foreach
        $xml .= '</rdf:RDF>';
        
        $fp = fopen('storage/db-backup/export-addressbook'.date("Y-m-d-H").'-rdf-.xml', 'w');
        fputs($fp, $xml);
        fclose($fp);
        
        header('Content-type: application/xml');
        header('Content-Disposition: attachment; filename="storage/db-backup/export-addressbook'.date("Y-m-d-H").'-rdf-.xml"');
        readfile('storage/db-backup/export-addressbook'.date("Y-m-d-H").'-rdf-.xml');
        
    } // END Function XML

} //END Class Controller
?>
