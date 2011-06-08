<?php
class contacts_model {
	public function get($id='') {
					
		$contacts_table = db('contacts');				
		$contacts = $contacts_table->select('*')
									->where('address_id','=',$id)
									->order_by('label','ASC')
									->execute();
				
		return $contacts;
	  }
	}
?> 