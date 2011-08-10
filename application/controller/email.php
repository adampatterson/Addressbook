<?php
class email_controller {
	public function message ($id='') {
    	core::valid_user();
    
		// Select Database Table
		$table = db('addressbook');

		// Get Contact From Database
		$contact = $table->select('id','=',$id);

		// Select Database Table
		$comments_table = db('comments');

		$contacts_table = load::model('contacts');
		$profile_images = load::model('image');

		load::view('email_compose', array( 'contact'=>$contact[0], 'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images));

		} // END Function Message
	}
?>