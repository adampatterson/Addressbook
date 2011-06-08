<?php
class delete_controller {
	public function action_comment($contactid, $commentid=''){
    if(!user::valid()) { url::redirect('admin/login'); }
    
		// Select Comments Table
		$comment_table = db('comments');
					
				// Query the Database
		$comment_table->delete()
				->where('commentid','=', $commentid)
				->execute();
				
				echo "Test";
				
		// Redirect to home page
    url::redirect('contacts/view/'.$contactid);
		} // END Function Action Delete Comment
		
		
	public function action_contact($contact_id='') {
    if(!user::valid()) { url::redirect('admin/login'); }
    
		// @todo delete all comments attached to the user ID at the same time.
		$comments_table = db('comments');
		$contacts_table = db('contacts');
		$address_table = db('addressbook');
				
		// Query the Database
		$comments_table->delete()
				->where('contact_id','=', $contact_id)
				->execute();
				
		// Query the Database
		$contacts_table->delete()
				->where('address_id','=', $contact_id)
				->execute();

		// Query the Database
		$address_table->delete()
				->where('id','=', $contact_id)
				->execute();
				
		// Redirect to home page
		url::redirect('page/listing/');
		} // END Function Action Delete
		
  public function action_group($group_id='') {
    if(!user::valid()) { url::redirect('admin/login'); }
      
    // @todo search all contacts with the Group ID and set the GID to #1 for unlisted

    // Update contacts to UnGrouped
    $contacts_table = db('addressbook');
    $contacts_table->update(array(
      'gid'=>'1',
      ))
    ->where('gid','=',$group_id)
    ->execute();

    // Delete
    $group_table = db('groups');

    $group_table->delete()
        ->where('gid','=', $group_id)
        ->execute();

    // Redirect to home page
    url::redirect('page/groups');
    } // END Function Action Delete
		
	}