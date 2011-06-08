<?php
class api_controller {
		//@todo accept a group, return all contacts
		//@todo accept a contact ID and return all data with it	
		
	public function json($group=''){
    if(!user::valid()) { url::redirect('admin/login'); }
    
		//@todo generate json structure for google maps
		$table = db('addressbook');
		
		$contacts = $table->select('firstname','lastname','lat','lng')
				->where('gid','=',$group)
                ->clause('AND')
                ->where('lat','!=','0')
				->order_by('firstname','asc')
				->execute();

        $count_total = $table->count()
                ->where('gid','=',$group)
                ->clause('AND')
                ->where('lat','!=','0')
                ->execute();
                
		load::view('api_json',array('contacts'=>$contacts, 'count_total'=>$count_total));
		} // END Function JSON

		
	public function xml($group=''){
    if(!user::valid()) { url::redirect('admin/login'); }
    
		//@todo generate xml structure
		$table = db('addressbook');
		
		$contacts = $table->select('*')
				->where('gid','=',$group)
				->order_by('firstname','asc')
				->execute();
				
		load::view('api_xml',array('contacts'=>$contacts));
		} // END Function XML
		
} //END Class Controller
?>