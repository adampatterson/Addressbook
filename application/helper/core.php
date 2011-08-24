<?
class core 
{
	// Valid User / Redirect
	// ---------------------------------------------------------------------------
	public static function valid_user()
	{	
		if(!user::valid()) 
		{    
			note::set("error","session",NOTE_SESSION);
			//note::set('error','session',CURRENT_PAGE);
			url::redirect('admin/login');  
		}
	}
	
}