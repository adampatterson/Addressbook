<?php
class contacts_controller {
	/* View Article Page */
	public function view($id) {
	    core::valid_user();
    
		// Select Database Table
		$table = db('addressbook');
		
		// Get Contact From Database
		$contact = $table->select('id','=',$id);
		
	    $groups_table = db('groups');
	    $group = $groups_table->select('gid','=',$contact[0]->gid);

		// Select Database Table
		$comments_table = db('comments');
		
		// Get Comments Database
		$comments = $comments_table->select('*')
                    ->where('contact_id','=',$id)
                    ->order_by('comment_date','DESC')
                    ->execute();
		
		load::helper('class_textile');
		$textile = new Textile();
					
		$contacts_table = load::model('contacts');
		$profile_images = load::model('image');	
		
		// Pass Data to View
        load::view('page_contact', array( 'contact'=>$contact[0], 'textile'=>$textile,'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images, 'comments'=>$comments, 'group'=>$group[0] )); 
	} // END Function View

}
?>