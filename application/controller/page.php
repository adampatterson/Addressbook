<?php
class page_controller {

  public function listing($current_page=1, $group='', $sort='asc') {

    $members_table = db('users');
    $total_members = $members_table->count()->execute();

    if ($total_members == '') {
      url::redirect('admin/new_user');  
    }

    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    // @todo sort by letter
    // @todo sort by group
    // @todo sort direction
    // @todo view in grid

    $address_table = db('addressbook');
    $total = $address_table->count()->execute();
    $page = new pagination($total, $current_page,25);

    // @todo Sort ASC
    if ($sort == 'desc'){
      $contacts = $address_table->select('*')
              ->order_by('firstname','DESC')
              ->order_by('lastname','ASC')
              ->limit($page->limit)
              ->offset($page->min)
              ->execute();
      } else {
      $contacts = $address_table->select('*')
          ->order_by('firstname','ASC')
          ->order_by('lastname','ASC')
          ->limit($page->limit)
          ->offset($page->min)
          ->execute();
      }

    $groups = db('groups')
            ->select('*')
            ->order_by('groups','ASC')
            ->execute();

    $contacts_table = load::model('contacts');
    $profile_images = load::model('image');

    load::helper('class_alphabet');
    $class_alphabet = new current_alphabet();

    // @todo Temp
    $group='';
    $alpha='';

    load::view('page_listing',array('contacts'=>$contacts, 'page'=>$page, 'groups'=>$groups, 'group'=>$group, 'class_alphabet'=>$class_alphabet, 'alphabet'=>$alpha, 'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images));
  } // END Function List


public function grouplist($gid='', $current_page=1) {
  
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    // @todo sort by letter
    // @todo sort by group
    // @todo sort direction
    // @todo view in grid

    $address_table = db('addressbook');
    $total = $address_table->count()->execute();
    $page = new pagination($total, $current_page,25);

    // @todo View a group
    $contacts = $address_table->select('*')
        ->where('gid','=',$gid)
        ->order_by('firstname','ASC')
        ->limit($page->limit)
        ->offset($page->min)
        ->execute();

    $groups_table = db('groups');
    $groups = $groups_table->select('*')
            ->order_by('groups','ASC')
            ->execute();

    $contacts_table = load::model('contacts');
    $profile_images = load::model('image');

    load::helper('class_alphabet');
    $class_alphabet = new current_alphabet();

    // Temp
    $group='';
    $alpha='';

    load::view('page_listing',array('contacts'=>$contacts,'page'=>$page, 'groups'=>$groups, 'group'=>$group, 'class_alphabet'=>$class_alphabet, 'alphabet'=>$alpha, 'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images));
    } // END Function List


  public function alphabetical($alpha='') {
    
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    // @todo sort by letter
    $address_table = db('addressbook');

    // @todo Sort Alphabetically
    $contacts = db::query("SELECT * FROM addressbook WHERE LEFT(firstname,1) = '$alpha' ORDER BY firstname ASC");

    $groups_table = db('groups');

    $groups = $groups_table->select('*')
            ->order_by('groups','ASC')
            ->execute();

    $contacts_table = load::model('contacts');
    $profile_images = load::model('image');

    load::helper('class_alphabet');
    $class_alphabet = new current_alphabet();

    load::view('page_listing',array('contacts'=>$contacts, 'groups'=>$groups, 'class_alphabet'=>$class_alphabet, 'alphabet'=>$alpha, 'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images));
    } // END Function List


  public function groups() {
    
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    $groups_table = db('groups');

    $groups = $groups_table->select('*')
            ->order_by('groups','ASC')
            ->execute();

    $count_group = load::model('groups');

    load::view('page_groups',array('groups'=>$groups, 'count_group'=>$count_group));
    } // END Function Groups


  public function maps($gid=''){
    
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
    }

	// load::helper('class_geoip');
	 //$class_geoip = new geoip();
	 $class_geoip = '';

    // @todo only bring back one group ID
    $groups = db('groups')
            ->select('*')
            ->order_by('groups','ASC')
            ->execute();


    load::view('page_maps',array('groups'=>$groups, 'gid'=>$gid, 'class_geoip',$class_geoip));
    }// END Function Maps


  public function export(){
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    load::view('page_export');
    }// END Function Export

  public function import(){
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    load::view('page_import');
    }// END Function Import


  public function members(){
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
    
    load::view('page_members');
    }// END Function members


  public function help(){
    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }
        
    load::view('page_help');
    }// END Function Help


  public function about(){
    load::view('page_about');
    }// END Function About

  public function search() {

    if(!user::valid()) {
      note::set("error","session",NOTE_SESSION);
      url::redirect('admin/login'); 
      }

    $alpha = '';

    // Grab the submited Data
    // @todo take the value and create an array

    $raw_string = input::post('search');
    $clean_string = db::clean($raw_string);

    // @todo Take that array and do a search
    $searchwords = split(" ", $clean_string);

    foreach($searchwords as $searchword) {
      $contacts = db::query("SELECT * FROM addressbook WHERE
        firstname LIKE '%".$searchword."%' OR
        lastname LIKE '%".$searchword."%' OR
        address LIKE '%".$searchword."%' OR
        address2 LIKE '%".$searchword."%' OR
        postalcode LIKE '%".$searchword."%' OR
        city LIKE '%".$searchword."%' OR
        province LIKE '%".$searchword."%' OR
        country LIKE '%".$searchword."%' OR
        website LIKE '%".$searchword."%'
        ORDER BY firstname ASC");
      } // END Foreach

    $groups = db('groups')
            ->select('*')
            ->order_by('groups','ASC')
            ->execute();

    $contacts_table = load::model('contacts');
    $profile_images = load::model('image');

    load::helper('class_alphabet');
    $class_alphabet = new current_alphabet();

    load::view('page_listing',array('contacts'=>$contacts, 'search_string'=>$clean_string, 'class_alphabet'=>$class_alphabet, 'alphabet'=>$alpha, 'groups'=>$groups, 'contacts_table'=>$contacts_table, 'profile_images'=>$profile_images));
    }// END Function Action Search

  // This is only used for Dev and will be a place to test helpers and DB querys
    public  function test(){
    	/*
			$groups_table = db('groups');
   			$groups = $groups_table->select('*')
            ->order_by('groups','ASC')
            ->execute();
			
        if (DEBUG == TRUE) {
				  $firephp = FirePHP::getInstance(TRUE);
					$firephp->fb('Debugging is enabled!');
					$firephp->dump('key', 'value');
					$firephp->log($groups, 'Log Label');
					$firephp->info($groups, 'Information Label');
					$firephp->warn($groups, 'Warning Label');
					$firephp->error($groups, 'Error Label');
					$firephp->trace('Trace to here');
				} // END DEBUG
	   */ 
	load::helper('function_gravatar');  
	   	
	$email = "adamapatterson@gmail.com";

    load::helper('class_geoip');

	load::view('page_test', array('gravatar'=>$email));

    }// END Function Test

} // END Class Controller
?>