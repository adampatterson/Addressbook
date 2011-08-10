<?php
/*
 * @version
 */
class admin_controller {
  
	public function post(){
	    core::valid_user();  

		$groups_table = db('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
						
		load::helper('class_month');
		load::helper('class_number');
		
		$class_number = new current_number();
		$class_month = new current_month();

		load::view('post_contact',array('groups'=>$groups, 'class_number'=>$class_number, 'class_month'=>$class_month));
		}// END Function Post
	
  public function post_group(){
    core::valid_user();
    
    load::view('post_group');
    }// END Function Post Group

	public function update($id) {
    if(!user::valid()) { url::redirect('admin/login'); }
		// Get the single listing SQL and pass the values to the update view
		// Select Database Table
		$table = db('addressbook');
		
		// Get Contact From Database
		$contact = $table->select('id','=',$id);

		$groups_table = db('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
						
		$contacts_table = db('contacts');				
		$contacts = $contacts_table->select('*')
									->where('address_id','=',$id)
									->order_by('label','ASC')
									->execute();	
									
		$comment_table = db('comments');				
		$comments = $comment_table->select('*')
									->where('contact_id','=',$id)
									->order_by('comment_date','DESC')
									->execute();										
							
		load::helper('class_textile');
		load::helper('class_month');
		load::helper('class_number');

		$textile = new Textile();
		
		$class_number = new current_number();
		$class_month = new current_month();
		
		// Pass Data to View
		load::view('update_contact',array('groups'=>$groups, 'class_number'=>$class_number, 'class_month'=>$class_month, 'contact'=>$contact[0], 'contacts'=>$contacts, 'comments'=>$comments, 'textile'=>$textile));
		}// END Function Update
		
		
	public function delete ($contact_id){
    	core::valid_user();
    
		$address_table = db('addressbook');
		
		// Select Database Table
		$table = db('addressbook');
		
		// Get Contact From Database
		$contact = $table->select('id','=',$contact_id);
		
		load::view('delete_contact', array('contact'=>$contact[0], 'contactid'=>$contact_id )); 
		} // END Function Delete Contact
		

	public function update_comment($contactid, $commentid) {
    	core::valid_user();
    
		$comment_table = db('comments');				
		$comment = $comment_table->select('*')
									->where('commentid','=',$commentid)
									->execute();										
							
		
		load::helper('class_textile');
		$textile = new Textile();
		
		load::view('update_comment',array('comment'=>$comment[0], 'contact_id'=>$contactid, 'textile'=>$textile));
		} // END Function Update Comment


	public function update_group($gid) {
	    core::valid_user();
    
	    $group_table = db('groups');        
	    $group = $group_table->select('*')
	                  ->where('gid','=',$gid)
	                  ->execute();                    

	    load::view('update_group',array('group'=>$group[0]));
	    } // END Function Update Comment
		
		
	public function delete_comment($contactid, $commentid) {
	   	core::valid_user();
   
		$comment_table = db('comments');				
		$comment = $comment_table->select('*')
									->where('commentid','=',$commentid)
									->execute();										
						
		load::helper('class_textile');
		$textile = new Textile();
		load::view('delete_comment',array('comment'=>$comment[0], 'contactid'=>$contactid, 'textile'=>$textile));
		} // END Function Update Comment
		
  public function delete_group($group_id) {
    core::valid_user();
    
    $groups_table = db('groups');        
    $group = $groups_table->select('*')
                  ->where('gid','=',$group_id)
                  ->execute();                    

    load::view('delete_group',array('group'=>$group[0], 'group_id'=>$group_id));
    } // END Function Update Comment


	public function login(){
	
		load::view('admin_login'); 
		} // END Function Login
		
		
	public function logout(){
	     
      user::logout();
      url::redirect('admin/login');
		} // END Function Logout
		
		
  public function lost(){

    load::view('admin_lost');
    } // END Function Logout
		
		
	public function profile(){
		core::valid_user();
		  
		load::view('admin_profile'); 
		} // END Function Profile
		
    public function new_user(){
        load::view('admin_new_user');
        } // END Function New User
    
		
	public function settings(){
		core::valid_user();
   
		load::view('page_settings');
		} // END Function Settings
		
} //END Class Controller
?>