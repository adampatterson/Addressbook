<?php 
/*
 * @version
 */
class upgrade_controller {

    public function contacts() {
    
    	// @todo add a check so this action is not run more than once. Possibly set a DB Key
		
    	// Select Addressbook table
    	$address_table = db('addressbook');
		
		  $address = $address_table->select('*')
					->order_by('firstname','ASC', 'lastname','ASC')
					->execute();

		// Select Contacts Table
		$contacts_table = db('contacts');

        foreach ($address as $row) {

            // Email
            $email1 = $row['email'];
            $email2 = $row['email2'];
            $email3 = $row['email3'];
            
            if ($email1 !== "") {
                $contacts_table->insert(array(
		 	        'value'=>$email1, 
					'type'=>'email', 
					'label'=>'other',
					'addressid'=>$row['id']
					));
            }
            if ($email2 !== "") {
              $contacts_table->insert(array(
		 	        'value'=>$email2, 
					'type'=>'email', 
					'label'=>'other',
					'addressid'=>$row['id']
					));
            }
            if ($email3 !== "") {
               $contacts_table->insert(array(
		 	        'value'=>$email3, 
					'type'=>'email', 
					'label'=>'other',
					'addressid'=>$row['id']
					));
            }
	            

	        // Phone
            $phoneHome = $row['home'];
            $phoneCell = $row['mobile'];
            $phoneWork = $row['work'];
            $phoneWork2 = $row['work2'];
            $phoneFax = $row['fax'];

            
            if ($phoneHome !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$phoneHome, 
					'type'=>'phone',
					'label'=> 'home', 
					'addressid'=>$row['id']
					));
            }
            if ($phoneCell !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$phoneCell, 
					'type'=>'phone',
					'label'=> 'cell', 
					'addressid'=>$row['id']
					));
            }
            if ($phoneWork !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$phoneWork, 
					'type'=>'phone',
					'label'=> 'work', 
					'addressid'=>$row['id']
					));
            }
            if ($phoneWork2 !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$phoneWork2, 
					'type'=>'phone',
					'label'=> 'work', 
					'addressid'=>$row['id']
					));
            }
            if ($phoneFax !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$phoneFax, 
					'type'=>'phone',
					'label'=> 'fax', 
					'addressid'=>$row['id']
					));
            }
	            
	            
            // IM
            $imYahoo = $row['yahoo'];
            $imMsn = $row['msn'];
            $imGtalk = $row['gtalk'];
            $imIcq = $row['icq'];
            $imAim = $row['aim'];
            $imSkype = $row['skype'];
            $imJabber = $row['jabber'];
                        
            if ($imYahoo !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imYahoo, 
					'type'=>'im',
					'label'=>'3', 
					'addressid'=>$row['id']
					));
            }
            if ($imMsn !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imMsn, 
					'type'=>'im',
					'label'=>'1', 
					'addressid'=>$row['id']
					));
            }
            if ($imGtalk !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imGtalk, 
					'type'=>'im',
					'label'=>'2', 
					'addressid'=>$row['id']
					));
            }
            if ($imIcq !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imIcq, 
					'type'=>'im',
					'label'=>'5', 
					'addressid'=>$row['id']
					));
            }
            if ($imAim !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imAim, 
					'type'=>'im',
					'label'=>'4', 
					'addressid'=>$row['id']
					));
            }
            if ($imSkype !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imSkype, 
					'type'=>'im',
					'label'=>'6', 
					'addressid'=>$row['id']
					));
            }
            if ($imJabber !== "") {
				$contacts_table->insert(array(
		 	        'value'=>$imJabber, 
					'type'=>'im',
					'label'=>'2', 
					'addressid'=>$row['id']
					));
            }
            
        }// END Foreach		      
	}// END Contacts Function
			
	public function remove_tables(){
		//@todo optinally delete old DB addressbook columns for email, im, and phone
		}// END Function Delete Tables  



	public function upgrade_profiles(){
		//@todo move image entries to profiles DB table
    	// Select Addressbook table
    	$address_table = db('addressbook');
		
		$address = $address_table->select('*')
					->order_by('firstname','ASC', 'lastname','ASC')
					->execute();

		// Select Contacts Table
		$profiles_table = db('profile_photo');

		// Get the current Time stamp
		$profile_date = time();

  foreach ($address as $row) {
		   	$profiles_table->insert(array(
					'filename'=>$row['profile'], 
					'profiledate'=>$profile_date, 
					'contactid'=>$row['id']
					));
			
		   }

		
		}// END Function Upgrade Images

}// END Controller
