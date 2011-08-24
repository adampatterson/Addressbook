<?php
/*
 * @version
 */
class update_controller {
	
public function action_contact($id){
     core::valid_user();
      
    // Grab the submited Data
    $firstname =       input::post('firstname');
    $lastname =        input::post('lastname');
	$salutation = 	     input::post('salutation');
    $title =           input::post('title');
    $company_name =    input::post('company_name');
    $address =         input::post('address');
    $address2 =        input::post('address2');
    $postalcode =      input::post('postalcode');
	$postbox = 	   		input::post('postbox');
    $city =            input::post('city');
    $province =        input::post('province');
    $country =         input::post('country');
    $website =         input::post('website');
    $profile =         input::post('profile');
    $emailList =       input::post('email');
    $phoneList =       input::post('phone');
    $imList =          input::post('im');
	$addressList = 	   input::post('other_address');
    $birth_day =       input::post('bDay');
    $birth_month =     input::post('bMonth');
    $birth_year =      input::post('bYear');
      
    $group =           input::post('group');
    
    $notes =           input::post('notes');
    $birthDateRaw =    '';  
    
    // Format Date
    if (!$birth_day == "0" || !$birth_month == "0") {
      $birthDateRaw =   mktime(0, 0, 0, $birth_month, $birth_day, $birth_year);
      //$birthDateFormat =  date('F jS, Y', $birthDateRaw);
      }

    $fileName =  $_FILES['profile']['name'];
    $tmpName  =  $_FILES['profile']['tmp_name'];
    //$fileSize =  $_FILES['profile']['size'];
    //$fileType =  $_FILES['profile']['type'];
    
     if (!$fileName == '') {
     // get the file extension first
      $ext      = substr(strrchr($fileName, "."), 1); 
    
      // generate the random file name
      $randName = md5(rand() * time());
         
      // and now we have the unique file name for the upload file
      $filePath = 'storage/profiles/'. $randName . '.' . $ext;
      
      $profile_name = $randName . '.' . $ext;
   
      $profile_result    = move_uploaded_file($tmpName, $filePath);
    }

    load::helper('class_google');
    $google_geo = new google();

		$geo_array  = $google_geo->getGeo($address, $city, $province, $country, $postalcode, $output='xml');

    /*
    load::helper('class_dbug');
    new dBug($geo_array);
     */
		$lng = $geo_array[0];
		$lat = $geo_array[1];


	// Select Database Table
		$table = db('addressbook');
		
  // Insert Post into Database
		$table->update(array(
	    	'firstname'=>$firstname, 
			'lastname'=>$lastname, 
			'salutation'=>$salutation, 
			'title'=>$title,
			'company_name'=>$company_name,
			'address'=>$address, 
			'address2'=>$address2, 
			'postalcode'=>$postalcode, 
			'postbox'=>$postbox, 
			'city'=>$city, 
			'province'=>$province,
			'country'=>$country, 
			'website'=>$website,
			'gid'=>$group, 
			'lat'=>$lat,
			'lng'=>$lng,
			'birthdate'=>$birthDateRaw
			))
		->where('id','=',$id)
		->execute();

			
		// Select Contacts Table
		$contacts_table = db('contacts');
	
		foreach ($emailList as $value) {
			// Insert Post into Database
			if (!$value['0'] == ''){
				// Does this contact already exist?
				if (isset($value['2'])){
					$contacts_table->delete()
						->where('contactid','=', $value['3'])
						->execute();
				} else if (isset($value['3'])) {
					$contacts_table->update(array(
	 	        'value'=>$value['0'], 
						'label'=>$value['1']
						))
						->where('contactid','=',$value['3'])
						->execute();
				} else { 
					// Insert new contact		
					$contacts_table->insert(array(
			 	    'value'=>$value['0'], 
						'type'=>'email', 
						'label'=>$value['1'],
						'address_id'=>$id
						));
					}
				}
     } 

		foreach ($phoneList as $value) {
			if (!$value['0'] == ''){
				// Does this contact already exist?
				if (isset($value['2'])){
					$contacts_table->delete()
						->where('contactid','=', $value['3'])
						->execute();
					
				} else if (isset($value['3'])) {
					$contacts_table->update(array(
	 	        'value'=>$value['0'], 
						'label'=>$value['1']
						))
						->where('contactid','=',$value['3'])
						->execute();
				} else {
					// Insert new contact
					$contacts_table->insert(array(
			 	        'value'=>$value['0'], 
						'type'=>'phone', 
						'label'=>$value['1'],
						'address_id'=>$id));
					}
	            }
			}
		
		foreach ($imList as $value) {
			if (!$value['0'] == ''){
				// Does this contact already exist?
				if (isset($value['2'])){
					$contacts_table->delete()
						->where('contactid','=', $value['3'])
						->execute();
				// Has it been deleted?
				} else if (isset($value['3'])) {
					$contacts_table->update(array(
			 	        'value'=>$value['0'], 
						'label'=>$value['1']
						))
						->where('contactid','=',$value['3'])
						->execute();
				} else {
					// Insert new contact
					$contacts_table->insert(array(
			 	        'value'=>$value['0'], 
						'type'=>'im', 
						'label'=>$value['1'],
						'address_id'=>$id));
					}
	            }
			}
			
		foreach ($addressList as $value) {
			
			echo '<pre>';
			print_r($value);
			echo '</pre>';
			
			// If a value is set then move on.
			if (!$value['0'] == ''){
				// Has it been deleted?
				if (isset($value['1'])){
					$contacts_table->delete()
						->where('contactid','=', $value['2'])
						->execute();
				// Does this address already exist?
				} else if (isset($value['2'])) {
					$contacts_table->update(array(
			 	        'value'=>$value['0'], 
						'label'=>'address'
						))
						->where('contactid','=',$value['2'])
						->execute();
				} else {
					// Insert new contact
					$contacts_table->insert(array(
			 	        'value'=>$value['0'], 
						'type'=>'address', 
						'label'=>'address',
						'address_id'=>$id));
					}
	            }
			}

    // Select Profile Table
    $profile_table = db('profile_photo');
                  
    // Get the current Time stamp
    $date = time();
    
    // @todo, update the contact ID if an image exists.
   if (isset($profile_name)) {
    
      // Select the ID, if it exists them update.
      $profile_lookup = $profile_table->select('*')
                    ->where('contact_id','=','$id')
                    ->execute();
                    
    if (isset($profile_lookup)) {
      // Update Profile in Database
      $profile_table->update(array(
            'contact_id'=>$id, 
            'profile_date'=>$date,
            'filename'=>$profile_name
            ))
        ->where('contact_id','=',$id)
        ->execute();
    } else {
        // Insert Profile into Database
        $profile_table->insert(array(
              'contact_id'=>$id, 
              'profile_date'=>$date,
              'filename'=>$profile_name
          ));
        } // END isset $profile_name
    }

    // Select Comments Table
    $comment_table = db('comments');
                  
    if (!$notes == '') {
      // Insert Notes into Database
      $comment_table->insert(array(
        'contact_id'=>$id, 
        'comment_date'=>$date,
        'comments'=>$notes
        ));
      }
		url::redirect('contacts/view/'.$id);
		} // END Action Update
	
	public function action_comment($contactid, $commentid){
	  core::valid_user();
		$notes = 		input::post('notes');
		
		// Select Comments Table
		$comment_table = db('comments');
				
		// Get the current Time stamp
		$date = time();
			
		if (!$notes == ' ') {
			// Insert Notes into Database
			$comment_table->update(array(
				'comment_date'=>$date,
				'comments'=>$notes
				))
				->where('commentid','=',$commentid)
				->execute();
			}
			
		// Get the Contact ID
		$comment = $comment_table->select('*')
									->where('commentid','=',$commentid)
									->execute();		
		$contact_id = $comment->contact_Id;
		
		// Redirect to Contact
		url::redirect('contacts/view/'.$contactid);
		} // END Function Action Update Comment
		
	public function action_group($gid){
	    core::valid_user();
	    $group_name = input::post('group_name');
    
		  // Select Database Table
	    $table = db('groups');
    
	    // Insert Post into Database
	    $table->update(array(
	      'groups'=>$group_name, 
	      ))
	    ->where('gid','=',$gid)
	    ->execute();
      
	   // Redirect to Groups
	   url::redirect('page/groups/');
	   } // END Function Action Update Group
   
  public function action_user(){
   core::valid_user();
    

    }
    
	public function action_profile(){
	
		core::valid_user();
		
	  	$email =       			input::post('email');
		$password =	 	       	input::post('password');
		
		// update the email address for the current user.
		if (!$password == "") {
			user::update(user::email())
			           ->password($password)
			           ->save();
			           
			// Need to relogin or else the user gets kicked
			//user::login(user::email(),$password);
			}

		// change the password for the current user.
		if (!$email == "") {
			user::update(user::email())
			           ->email($email)
			           ->save();
			}		

		// Redirect to Profile Page
		url::redirect('admin/profile/');
	}
		
} // END Class  Controller