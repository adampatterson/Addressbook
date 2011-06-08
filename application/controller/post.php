<?php
/*
 * @version
 */
class post_controller {
	public function action_contact (){
    if(!user::valid()) { url::redirect('admin/login'); }
    
		// Grab the submited Data
	  $firstname =       input::post('firstname');
		$lastname = 	     input::post('lastname');
		$title =	 	       input::post('title');
		$company_name =    input::post('company_name');
		$address = 		     input::post('address');
		$address2 = 	     input::post('address2');
		$postalcode = 	   input::post('postalcode');
		$city = 		       input::post('city');
		$province = 	     input::post('province');
		$country = 		     input::post('country');
		$website = 		     input::post('website');
		$profile = 		     input::post('profile');
		$emailList = 	     input::post('email');
		$phoneList = 	     input::post('phone');
		$imList = 		     input::post('im');
		$birth_day = 	     input::post('bDay');
		$birth_month =  	 input::post('bMonth');
		$birth_year = 	   input::post('bYear');
		  
		$group = 		       input::post('group');
		
		$notes = 		       input::post('notes');
		$birthDateRaw =    '';
    
		// Format Date
		if (!$birth_day == "0" || !$birth_month == "0") {
			$birthDateRaw = 	mktime(0, 0, 0, $birth_month, $birth_day, $birth_year);
			//$birthDateFormat = 	date('F jS, Y', $birthDateRaw);
			}

	$fileName =  $_FILES['profile']['name'];
    $tmpName  =  $_FILES['profile']['tmp_name'];
    //$fileSize =  $_FILES['profile']['size'];
    //$fileType =  $_FILES['profile']['type'];

    if (isset($fileName)) {
     // get the file extension first
	    $ext      = substr(strrchr($fileName, "."), 1); 
		
  		// generate the random file name
      $randName = md5(rand() * time());
         
      // and now we have the unique file name for the upload file
      $filePath = 'storage/profiles/'. $randName . '.' . $ext;
  		
  		$profile_name = $randName . '.' . $ext;
   
  	  $profile_result    = move_uploaded_file($tmpName, $filePath);
    } else {
      $profile_name = 'default.jpg';
        
    }
   
		load::helper('class_google');
		
		$google_geo = new google();
		
		$geo_array  = $google_geo->getGeo($address, $city, $province, $country, $postalcode, $output='xml');

		$lng = $geo_array[0];
		$lat = $geo_array[1];   
  

		// Select Database Table
		$address_table = db('addressbook');
		
		// Insert Post into Database
		$row = $address_table->insert(array(
 	    'firstname'=>$firstname, 
			'lastname'=>$lastname, 
			'title'=>$title,
			'company_name'=>$company_name,
			'address'=>$address, 
			'address2'=>$address2, 
			'postalcode'=>$postalcode, 
			'city'=>$city, 
			'province'=>$province,
			'country'=>$country, 
			'website'=>$website, 
			'gid'=>$group,
			'lat'=>$lat,
			'lng'=>$lng,
			'birthdate'=>$birthDateRaw
			));
	
		// Select Contacts Table
		$contacts_table = db('contacts');
		
		foreach ($emailList as $value) {
			if (!$value['0'] =='') {
				// Insert Post into Database
				$contacts_table->insert(array(
		 	        'value'=>$value['0'], 
					'type'=>'email', 
					'label'=>$value['1'],
					'address_id'=>$row->id
					));
				}
      } 
		
		foreach ($phoneList as $value) {
			if (!$value['0'] =='') {
				// Insert Post into Database
				$contacts_table->insert(array(
		 	        'value'=>$value['0'], 
					'type'=>'phone',
					'label'=>$value['1'], 
					'address_id'=>$row->id
					));
				}
     } 
		
		foreach ($imList as $value) {
			if (!$value['0'] =='') {
				// Insert Post into Database
				$contacts_table->insert(array(
		 	        'value'=>$value['0'], 
					'type'=>'im',
					'label'=>$value['1'], 
					'address_id'=>$row->id
					));
				}
            } 
			
		// Select Profile Table
		$profile_table = db('profile_photo');
    							
		// Get the current Time stamp
		$date = time();
    
		if (isset($profile_name)) {
			// Insert Profile into Database
			$profile_table->insert(array(
	 	        'contact_id'=>$row->id, 
				    'profile_date'=>$date,
				    'filename'=>$profile_name
				));
			}
					
		// Select Comments Table
		$comment_table = db('comments');
			
		if (!$notes == '') {
			// Insert Notes into Database
			$comment_table->insert(array(
	 	        'contact_id'=>$row->id, 
				    'comment_date'=>$date,
				    'comments'=>$notes
				));
			}

		// Redirect to home page
		url::redirect('page/listing/');
		} // END Action Post
	
	
	public function action_comment($id){
    if(!user::valid()) { url::redirect('admin/login'); }
    
		$notes = 		input::post('notes');
		
		// Select Comments Table
		$comment_table = db('comments');
							
		// Get the current Time stamp
		$date = time();
			
		if (!$notes == '') {
			// Insert Notes into Database
			$comment_table->insert(array(
	 	        'contact_id'=>$id, 
				'comment_date'=>$date,
				'comments'=>$notes
				));
			}
		// Redirect to Contact
		url::redirect('contacts/view/'.$id);
		} // END Function Action Add Comment
		
		
  public function action_group (){
    if(!user::valid()) { url::redirect('admin/login'); }
    
    $group_name = input::post('group_name');
    
    // Select Database Table
    $table = db('groups');
    
    if (!$group_name == '') {
      // Insert Notes into Database
      $table->insert(array(
          'groups'=>$group_name,
        ));
      }

    url::redirect('page/groups');
    } // END Function Action Add Group
		
		
	public function action_send($to_id=''){
    if(!user::valid()) { url::redirect('admin/login'); }

		$to_address = input::post('email_address');
        $from_address = user::email();;
		$subject = input::post('subject');
        $message = input::post('message');

        // Attach that Hash to the users email address.
            $mail = new email();
            $mail->to($to_address);
            $mail->from($from_address);
            $mail->subject($subject);
            $mail->content($message);
            $mail->send();

        //url::redirect('/');
		}
	
    public function action_login(){

      $username =       input::post('username');
      $password =       input::post('password');
      
      user::login($username, $password);

      if(user::valid()) {
        url::redirect('page/listing');
      } else {
         note::set("error","login",NOTE_PASSWORD);
         url::redirect('admin/login'); 
      }

    }// END Function Action Login
     
    public function action_lost(){
    
        $username =       input::post('username');

        $users_table = db('users');               
        $user = $users_table->select('*')
                        ->where('email','=',$username)
                        ->execute();
                 
        if ( isset($user[0]->email)) {
            // Generate a Hash from the users IP
            
            
            $ip = $_SERVER['REMOTE_ADDR'];

            $hashed_ip = sha1($ip.time());
            
            $users_table->update(array(
                'forgot_password'=>$hashed_ip
                ))
                ->where('email','=',$username)
                ->execute();
            
            // Attach that Hash to the users email address.
            $mail = new email();
            $mail->to($username);
            $hash_address = BASE_URL.'user/reset/'.$hashed_ip;
            // @todo get install admings email address
            $mail->from('Addressbook');
            $mail->subject('Missing Password');
            $mail->content('<strong>Click the linnk to reset your password.</strong><br />'.$hash_address);
            $mail->send();

            note::set("error","forgot",NOTE_LOST);
            
            url::redirect('/'); 
            
        } else {
            // @todo set lost password error message for not match
            echo 'no match, Set an error message';
        }

    } // END Function Action Login
     
     
    public function action_new_user(){

		$user_table = db('users');				
		$user_lookup = $user_table->select('*')
						->execute();

		//if (!$user_lookup) {
	        $username =       input::post('username');
	        $password =       input::post('password');

			 user::create(array(
	          'email'=>$username,
	          'password'=>$password,
	          'type'=>'admin'
	        ));
		//}

        url::redirect('admin/login');
      } // END Function action_new_user
      
  public function action_update_user($url_hash =''){
        $username =       input::post('username'); 
        $password =       input::post('password');  

        $users_table = db('users');  
        $users_table->update(array(
            'forgot_password'=>' '
            ))
            ->where('email','=',$username)
            ->execute();
            
        user::update($username)
           ->password($password)
           ->save();
            
        url::redirect('admin/login');
  } // END Function action_update_user
       
  public function action_bug(){
    if(!user::valid()) { url::redirect('admin/login'); }  
      
      $message =       input::post('message');

      echo $message;
      
    } // END Function post

	}
?>