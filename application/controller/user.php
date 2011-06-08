<?
class user_controller {
    public function reset ($url_hash =''){
        
            $users_table = db('users');               
            $user = $users_table->select('*')
                            ->where('forgot_password','=',$url_hash)
                            ->execute();
           
           if(isset($user[0]->email)) {
                              
               load::view('user_reset',array('email'=>$user[0]->email)); 

           } else {
               echo 'No Match';
               // @todo set an error and redirect back to the login page.
           } // END if
           
        } // END function reset
    
    } // END class lost
?>