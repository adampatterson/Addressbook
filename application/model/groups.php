<?php
class groups_model {
	public function count($gid='') {
		$contacts_table = db('addressbook');
		
		// Query the database
		$count = $contacts_table->count()->where('gid','=',$gid)->execute();
		
		return $count;
	  }
	}
?> 